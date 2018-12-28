<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 *
 * @method \App\Model\Entity\Client[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Managers']
        ];
        $clients = $this->paginate($this->Clients);

        $this->set(compact('clients'));
    }

    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('client', $client);
    }

    public function rent()
    {
        $rents = Array();
        if ($this->request->is('post')) {
            $values = $this->request->getData();
            echo $start_date = date('Y-m-d', strtotime($values['start_date']));
            echo '<br>';
            echo $end_date = date('Y-m-d', strtotime($values['end_date']));

            $rents = TableRegistry::getTableLocator()->get('Rents')->find('all', [
                'conditions' => [
                    'Rents.date  >=' => $start_date,
                    'Rents.date  <=' => $end_date,
                    'Rents.landlord_id ' => $this->getRequest()->getSession()->read('id')
                ],
                'contain' => ['Branches', 'Users', 'Deposits', 'Landlords', 'Occupants']
            ]);
            if (!$rents) {
                $this->Flash->error(__('No results.'));

            }
        }

        $this->set(compact('rents', 'branches', 'users', 'deposits'));
    }

    public function requisitions()
    {
        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d');
        $user_id = "";
        $requisitions = "";
        if ($this->request->is('post')) {
            $values = $this->request->getData();
            $start_date = date('Y-m-d', strtotime($values['start_date']));
            $end_date = date('Y-m-d', strtotime($values['end_date']));
            $user_id = $this->getRequest()->getSession()->read('id');

            $requisitions = TableRegistry::getTableLocator()->get('Requisitions')->find()
                ->enableAutoFields()
                ->contain([
                    'Users',
                    'Properties',
                    'Units',
                    'Approveds',
                    'Paids',
                    'Requesteds',
                    'Expenses'
                ])
                ->where([
                    'date  >=' => $start_date,
                    'date  <=' => $end_date,
                    'Requisitions.user_id' => $user_id
                ]);
        }

        $this->set(compact('requisitions', 'users'));
    }

    public function financial()
    {
        $rents = Array();
        if ($this->request->is('post')) {
            $values = $this->request->getData();
            $start_date = date('Y-m-d', strtotime($values['start_date']));
            //   echo '<br>';
            $end_date = date('Y-m-d', strtotime($values['end_date']));

            $rents = TableRegistry::getTableLocator()->get('Rents')->find('all', [
                'conditions' => [
                    'Rents.date  >=' => $start_date,
                    'Rents.date  <=' => $end_date,
                    'Rents.landlord_id' => $this->getRequest()->getSession()->read('id')
                ],
                'contain' => ['Branches', 'Users', 'Deposits', 'Landlords', 'Occupants'],
                'groupField' => 'Rents.date'
            ]);


            $query = TableRegistry::getTableLocator()->get('Users')->find('basicInfo')
                ->select([
                    'property_name' => 'p.name',
                    'occupant_id' => 'Users.id',
                    'room' => 'u.name',
                    'cost' => 'u.cost',
                    'total_paid' => 'r.total_paid',
                    'date' => 'r.date',
                    'paid_months' => 'r.paid_months',
                    'security' => 's.amount',
                    'start_date' => 'r.start_date',
                    'end_date' => 'r.end_date',
                    'unpaid_months' => 'r.unpaid_months',
                    'balance' => 'r.balance',
                    'for_commission' => 'r.for_commission',
                    'for_client' => 'r.for_client',
                    'tenancy_start' => 't.start_date',
                    'tenancy_end' => 't.end_date'

                ])
                ->join(
                    [
                        'u' => [
                            'table' => 'units',
                            'type' => 'LEFT',
                            'conditions' => ['u.user_id' => new \Cake\Database\Expression\IdentifierExpression('Users.id')]
                        ],
                        'p' => [
                            'table' => 'properties',
                            'type' => 'LEFT',
                            'conditions' => ['p.id' => new \Cake\Database\Expression\IdentifierExpression('u.property_id')]
                        ],
                        'r' => [
                            'table' => 'rents',
                            'type' => 'LEFT',
                            'conditions' => [
                                'r.date  >=' => $start_date,
                                'r.date  <=' => $end_date,
                                'r.occupant_id =' => new \Cake\Database\Expression\IdentifierExpression('Users.id')
                            ]
                        ],
                        's' => [
                            'table' => 'securities',
                            'type' => 'LEFT',
                            'conditions' => [
                                's.date  >=' => $start_date,
                                's.date  <=' => $end_date,
                                's.user_id =' => new \Cake\Database\Expression\IdentifierExpression('Users.id')
                            ]
                        ],
                        't' => [
                            'table' => 'tenants',
                            'type' => 'LEFT',
                            'conditions' => [
                                't.user_id =' => new \Cake\Database\Expression\IdentifierExpression('Users.id')
                            ]
                        ]
                    ])
                ->where([
                    'Users.user_id =' => $this->getRequest()->getSession()->read('id'),
                    'Users.active =' => 'yes'
                ])->order(['room' => 'ASC']);


            $payments = $query->all();


            $occupants_ids = [];
            foreach ($payments as $payment) {
                if (empty($payment['date'])) {
                    $occupants_ids[] = $payment['occupant_id'];
                }
            }
            $maps = [];
            foreach ($occupants_ids as $not_paid) {
                $object = TableRegistry::getTableLocator()->get('Rents')->find()
                    ->select([
                        'occupant_id' => 'occupant_id',
                        'last_paid_date' => 'date',
                        'last_paid_start_date' => 'start_date',
                        'last_paid_end_date' => 'end_date'
                    ])
                    ->where(['occupant_id =' => $not_paid])
                    ->order(['date' => 'DESC'])->limit(1)->first();
                $maps[$object->get('occupant_id')] = $object;
            }


            /*  echo '<pre>';
              var_dump($maps);
              echo '</pre>';
              exit();*/

            $payments = $payments->map(function ($payment) use ($maps) {

                if ($object = $maps[$payment->occupant_id] ?? null) {
                    //$payment->date = $object['last_paid_date'];
                    $payment->last_pay = $object['last_paid_date'];
                    $payment->last_paid_start_date = $object['last_paid_start_date'];
                    $payment->last_paid_end_date = $object['last_paid_end_date'];
                }
                return $payment;
            });

            $financials = $payments;
            $tenancy = $financials;
            /*   echo '<pre>';
               var_dump($tenancy);
               echo '</pre>';
               exit();*/

            $requisitions = TableRegistry::getTableLocator()->get('Requisitions')->find('all', [
                'conditions' => [
                    'date  >=' => $start_date,
                    'date  <=' => $end_date,
                    'paid  =' => 'no',
                    'user_id' => $this->getRequest()->getSession()->read('id')
                ]
            ])->select([
                'id',
                'date' => 'Requisitions.date',
                'details',
                'no' => 'Requisitions.no',
                'category',
                'item' => 'e.item',
                'qty' => 'e.qty',
                'total' => 'e.total',
                'cost' => 'e.cost'
            ])
                ->join(
                    [
                        'e' => [
                            'table' => 'Expenses',
                            'type' => 'LEFT',
                            'conditions' => ['e.requisition_id' => new \Cake\Database\Expression\IdentifierExpression('Requisitions.id')]
                        ]

                    ]);
            $requisitions = $this->paginate($requisitions);


            $cashs = TableRegistry::getTableLocator()->get('Rents')->find('all', [
                'conditions' => [
                    'Rents.date  >=' => $start_date,
                    'Rents.date  <=' => $end_date,
                    'Rents.landlord_id' => $this->getRequest()->getSession()->read('id'),
                    'Rents.method  =' => 'cash',
                ],
                'contain' => ['Branches', 'Users', 'Deposits', 'Landlords', 'Occupants'],
                'groupField' => 'Rents.date'
            ]);


            if (!$rents) {
                $this->Flash->error(__('No results.'));

            }

            $installments = TableRegistry::getTableLocator()->get('Installments')->find()
                ->contain([
                    'Users' => function (Query $query) use ($values) {
                        return $query->find('tenantInfo', ['user_id' => $this->getRequest()->getSession()->read('id')]);
                    }
                ])
                ->where([
                    'date  >=' => $start_date,
                    'date  <=' => $end_date
                ]);

            $installments = $this->paginate($installments);
            $client = TableRegistry::getTableLocator()->get('Users')->get($this->getRequest()->getSession()->read('id'));

        }


        $this->set(compact('rents', 'branches', 'users', 'deposits', 'financials', 'requisitions', 'cashs',
            'installments', 'tenancy', 'end_date', 'start_date', 'client'));
    }

    public function expense()
    {
        $rents = Array();
        if ($this->request->is('post')) {
            $values = $this->request->getData();
            $start_date = date('Y-m-d', strtotime($values['start_date']));
            //   echo '<br>';
            $end_date = date('Y-m-d', strtotime($values['end_date']));

            $rents = TableRegistry::getTableLocator()->get('Rents')->find('all', [
                'conditions' => [
                    'Rents.date  >=' => $start_date,
                    'Rents.date  <=' => $end_date,
                    'Rents.landlord_id' => $this->getRequest()->getSession()->read('id')
                ],
                'contain' => ['Branches', 'Users', 'Deposits', 'Landlords', 'Occupants'],
                'groupField' => 'Rents.date'
            ]);


            $requisitions = TableRegistry::getTableLocator()->get('Requisitions')->find('all', [
                'conditions' => [
                    'date  >=' => $start_date,
                    'date  <=' => $end_date,
                    'paid  =' => 'no',
                    'user_id' => $this->getRequest()->getSession()->read('id')
                ]
            ])->select([
                'id',
                'date' => 'Requisitions.date',
                'details',
                'no' => 'Requisitions.no',
                'category',
                'item' => 'e.item',
                'qty' => 'e.qty',
                'total' => 'e.total',
                'cost' => 'e.cost'
            ])
                ->join(
                    [
                        'e' => [
                            'table' => 'Expenses',
                            'type' => 'LEFT',
                            'conditions' => ['e.requisition_id' => new \Cake\Database\Expression\IdentifierExpression('Requisitions.id')]
                        ]

                    ]);
            $requisitions = $this->paginate($requisitions);
            $client = TableRegistry::getTableLocator()->get('Users')->get($this->getRequest()->getSession()->read('id'));

        }
        if (!$requisitions) {
            $this->Flash->error(__('No results.'));
        }
        $users = TableRegistry::get('Users')->find('all', [
            'conditions' => ['Users.type =' => 'client'],
            'keyField' => 'id',
            'valueField' => 'first_name'
        ]);

        $this->set(compact('rents', 'branches', 'users', 'deposits', 'financials', 'requisitions', 'cashs',
            'installments', 'tenancy', 'end_date', 'start_date', 'client'));
    }

    public function deposits()
    {
        if ($this->request->is('post')) {
            $values = $this->request->getData();
            $start_date = date('Y-m-d', strtotime($values['start_date']));
            $end_date = date('Y-m-d', strtotime($values['end_date']));
            $query = TableRegistry::getTableLocator()->get('Deposits')->find('all', [
                'conditions' => [
                    'date  >=' => $start_date,
                    'date  <=' => $end_date,

                    'Deposits.user_id' => $this->getRequest()->getSession()->read('id')
                ],
                'contain' => ['Users', 'Accounts', 'Prepareds', 'Approveds', 'Depositeds']
            ]);
            $deposits = $query;
             $this->set(compact('deposits'));
        }
        $this->set(compact('deposits'));

    }
    public function tenants()
    {
            $start_date = date('Y-m-d');
            $end_date = date('Y-m-d');
            $rents = TableRegistry::getTableLocator()->get('Rents')->find('all', [
                'conditions' => [
                    'Rents.date  >=' => $start_date,
                    'Rents.date  <=' => $end_date,
                    'Rents.landlord_id' => $this->getRequest()->getSession()->read('id')
                ],
                'contain' => ['Branches', 'Users', 'Deposits', 'Landlords', 'Occupants'],
                'groupField' => 'Rents.date'
            ]);
            $query = TableRegistry::getTableLocator()->get('Users')->find('basicInfo')
                ->select([
                    'property_name' => 'p.name',
                    'occupant_id' => 'Users.id',
                    'room' => 'u.name',
                    'cost' => 'u.cost',
                    'total_paid' => 'r.total_paid',
                    'date' => 'r.date',
                    'paid_months' => 'r.paid_months',
                    'security' => 's.amount',
                    'start_date' => 'r.start_date',
                    'end_date' => 'r.end_date',
                    'unpaid_months' => 'r.unpaid_months',
                    'balance' => 'r.balance',
                    'for_commission' => 'r.for_commission',
                    'for_client' => 'r.for_client',
                    'tenancy_start' => 't.start_date',
                    'tenancy_end' => 't.end_date'
                ])
                ->join(
                    [
                        'u' => [
                            'table' => 'units',
                            'type' => 'LEFT',
                            'conditions' => ['u.user_id' => new \Cake\Database\Expression\IdentifierExpression('Users.id')]
                        ],
                        'p' => [
                            'table' => 'properties',
                            'type' => 'LEFT',
                            'conditions' => ['p.id' => new \Cake\Database\Expression\IdentifierExpression('u.property_id')]
                        ],
                        'r' => [
                            'table' => 'rents',
                            'type' => 'LEFT',
                            'conditions' => [
                                'r.date  >=' => $start_date,
                                'r.date  <=' => $end_date,
                                'r.occupant_id =' => new \Cake\Database\Expression\IdentifierExpression('Users.id')
                            ]
                        ],
                        's' => [
                            'table' => 'securities',
                            'type' => 'LEFT',
                            'conditions' => [
                                's.date  >=' => $start_date,
                                's.date  <=' => $end_date,
                                's.user_id =' => new \Cake\Database\Expression\IdentifierExpression('Users.id')
                            ]
                        ],
                        't' => [
                            'table' => 'tenants',
                            'type' => 'LEFT',
                            'conditions' => [
                                't.user_id =' => new \Cake\Database\Expression\IdentifierExpression('Users.id')
                            ]
                        ]
                    ])
                ->where([
                    'Users.user_id =' => $this->getRequest()->getSession()->read('id'),
                    'Users.active =' => 'yes'
                ])->order(['room' => 'ASC']);

            $payments = $query->all();
            $occupants_ids = [];
            foreach ($payments as $payment) {
                if (empty($payment['date'])) {
                    $occupants_ids[] = $payment['occupant_id'];
                }
            }
            $maps = [];
            foreach ($occupants_ids as $not_paid) {
                $object = TableRegistry::getTableLocator()->get('Rents')->find()
                    ->select([
                        'occupant_id' => 'occupant_id',
                        'last_paid_date' => 'date',
                        'last_paid_start_date' => 'start_date',
                        'last_paid_end_date' => 'end_date'
                    ])
                    ->where(['occupant_id =' => $not_paid])
                    ->order(['date' => 'DESC'])->limit(1)->first();
                $maps[$object->get('occupant_id')] = $object;
            }
            $payments = $payments->map(function ($payment) use ($maps) {

                if ($object = $maps[$payment->occupant_id] ?? null) {
                    //$payment->date = $object['last_paid_date'];
                    $payment->last_pay = $object['last_paid_date'];
                    $payment->last_paid_start_date = $object['last_paid_start_date'];
                    $payment->last_paid_end_date = $object['last_paid_end_date'];
                }
                return $payment;
            });

            $financials = $payments;
            $tenancy = $financials;


            if (!$rents) {
                $this->Flash->error(__('No results.'));

            }
            $client = TableRegistry::getTableLocator()->get('Users')->get($this->getRequest()->getSession()->read('id'));

        $this->set(compact('rents', 'branches', 'users', 'deposits', 'tenancy', 'end_date', 'start_date', 'client'));
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $client = $this->Clients->newEntity();
        if ($this->request->is('post')) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                if ($this->usingApi) {
                    $id = $client->id;
                    $this->set(compact('id'));
                    $this->set('_serialize', 'id');
                    return;
                }
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            if ($this->usingApi) {
                // var_dump($client->getErrors());
                // exit;
                $message = 'failed';
                $this->set(compact('message'));
                $this->set('_serialize', 'message');
                return;
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }
        $users = $this->Clients->Users->find('list', ['limit' => 200]);
        $this->set(compact('client', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }
        $users = $this->Clients->Users->find('list', ['limit' => 200]);
        $this->set(compact('client', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('The client has been deleted.'));
        } else {
            $this->Flash->error(__('The client could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
