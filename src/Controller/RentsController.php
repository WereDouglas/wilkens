<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

/**
 * Rents Controller
 *
 * @property \App\Model\Table\RentsTable $Rents
 *
 * @method \App\Model\Entity\Rent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Branches', 'Users', 'Deposits', 'Landlords', 'Occupants']
        ];
        $rents = $this->paginate($this->Rents);

        $this->set(compact('rents'));
    }

    /**
     * View method
     *
     * @param string|null $id Rent id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rent = $this->Rents->get($id, [
            'contain' => ['Branches', 'Users', 'Deposits', 'MonthlyPayments', 'Penalties']
        ]);

        $this->set('rent', $rent);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rent = $this->Rents->newEntity();
        if ($this->request->is('post')) {
            $rent = $this->Rents->patchEntity($rent, $this->request->getData());
            if ($this->Rents->save($rent)) {
                if ($this->startsWith($this->getRequest()->getRequestTarget(), '/api')) {
                    $id = $rent->id;
                    $this->set(compact('id'));
                    $this->set('_serialize', 'id');
                    return;
                }
                $this->Flash->success(__('The rent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            if ($this->startsWith($this->getRequest()->getRequestTarget(), '/api')) {
                // var_dump($rent->getErrors());
                //  exit;
                $message = 'failed';
                $this->set(compact('message'));
                $this->set('_serialize', 'message');
                return;
            }
            $this->Flash->error(__('The rent could not be saved. Please, try again.'));
        }
        $branches = $this->Rents->Branches->find('list', ['limit' => 200]);
        $users = $this->Rents->Users->find('list', ['limit' => 200]);
        $deposits = $this->Rents->Deposits->find('list', ['limit' => 200]);
        $this->set(compact('rent', 'branches', 'users', 'deposits'));
    }

    public function report()
    {
        $rents = Array();
        if ($this->request->is('post')) {
            $values = $this->request->getData();
            echo $start_date = date('Y-m-d', strtotime($values['start_date']));
            echo '<br>';
            echo $end_date = date('Y-m-d', strtotime($values['end_date']));

            $rents = $this->Rents->find('all', [
                'conditions' => ['Rents.date  >=' => $start_date, 'Rents.date  <=' => $end_date],
                'contain' => ['Branches', 'Users', 'Deposits', 'Landlords', 'Occupants']
            ]);
            if (!$rents) {
                $this->Flash->error(__('No results.'));

            }
        }

        $this->set(compact('rents', 'branches', 'users', 'deposits'));
    }

    public function client()
    {
        $rents = Array();
        if ($this->request->is('post')) {
            $values = $this->request->getData();
            $start_date = date('Y-m-d', strtotime($values['start_date']));

            $end_date = date('Y-m-d', strtotime($values['end_date']));

            $rents = $this->Rents->find('all', [
                'conditions' => [
                    'Rents.date  >=' => $start_date,
                    'Rents.date  <=' => $end_date,
                    'landlord_id' => $values['user_id']
                ],
                'contain' => ['Branches', 'Users', 'Deposits', 'Landlords', 'Occupants']
            ]);
            if (!$rents) {
                $this->Flash->error(__('No results.'));

            }
        }
        $users = TableRegistry::get('Users')->find('all', [
            'conditions' => ['Users.type =' => 'client'],
            'keyField' => 'id',
            'valueField' => 'first_name'
        ]);

        $this->set(compact('rents', 'branches', 'users', 'deposits'));
    }

    public function financials()
    {
        $rents = Array();
        if ($this->request->is('post')) {
            $values = $this->request->getData();
            $start_date = date('Y-m-d', strtotime($values['start_date']));

            $end_date = date('Y-m-d', strtotime($values['end_date']));

            $rents = $this->Rents->find('all', [
                'conditions' => [
                    'Rents.date  >=' => $start_date,
                    'Rents.date  <=' => $end_date,
                    'Rents.landlord_id' => $values['user_id']
                ],
                'contain' => ['Branches', 'Users', 'Deposits', 'Landlords', 'Occupants'],
                'groupField' => 'Landlords.first_name'
            ]);
            if (!$rents) {
                $this->Flash->error(__('No results.'));

            }
        }
        // $users   = TableRegistry::get('Users')->find('all')->where(['type' => 'client']);
        $users = TableRegistry::get('Users')->find('all', [
            'conditions' => ['Users.type =' => 'client'],
            'keyField' => 'id',
            'valueField' => 'first_name'
        ]);

        $this->set(compact('rents', 'branches', 'users', 'deposits'));
    }

    public function financial()
    {
        $rents = Array();
        if ($this->request->is('post')) {
            $values = $this->request->getData();
            $start_date = date('Y-m-d', strtotime($values['start_date']));
            //   echo '<br>';
            $end_date = date('Y-m-d', strtotime($values['end_date']));

            $rents = $this->Rents->find('all', [
                'conditions' => [
                    'Rents.date  >=' => $start_date,
                    'Rents.date  <=' => $end_date,
                    'Rents.landlord_id' => $values['user_id']
                ],
                'contain' => ['Branches', 'Users', 'Deposits', 'Landlords', 'Occupants'],
                'groupField' => 'Rents.date'
            ]);
            //  echo $values['user_id'];
            //   $query = TableRegistry::getTableLocator()->get('Users')->find('basicInfo', ['user_id' => $id])
            $query = TableRegistry::getTableLocator()->get('Users')->find('basicInfo')
                ->select([
                    'property_name' => 'p.name',
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
                    ])->where([
                    'Users.user_id =' => $values['user_id'],
                    'Users.active =' => 'yes'
                ])->order(['room' => 'ASC']);
            $financials = $this->paginate($query);


            $tenancy  = $financials;


            /*echo '<pre>';
            var_dump($tenancy);
            echo '</pre>';
            exit();*/

            $requisitions = TableRegistry::getTableLocator()->get('Requisitions')->find('all', [
                'conditions' => [
                    'date  >=' => $start_date,
                    'date  <=' => $end_date,
                    'user_id' => $values['user_id']
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


            $cashs = $this->Rents->find('all', [
                'conditions' => [
                    'Rents.date  >=' => $start_date,
                    'Rents.date  <=' => $end_date,
                    'Rents.landlord_id' => $values['user_id'],
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
                        return $query->find('tenantInfo', ['user_id' => $values['user_id']]);
                    }
                ])
                ->where([
                    'date  >=' => $start_date,
                    'date  <=' => $end_date
                ]);
            /*echo '<pre>';
            var_dump($installments);
            echo '</pre>';
            exit();*/
            $installments = $this->paginate($installments);
        }

        $users = TableRegistry::get('Users')->find('all', [
            'conditions' => ['Users.type =' => 'client'],
            'keyField' => 'id',
            'valueField' => 'first_name'
        ]);

        $this->set(compact('rents', 'branches', 'users', 'deposits', 'financials', 'requisitions', 'cashs',
            'installments','tenancy','end_date','start_date'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rent id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rent = $this->Rents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rent = $this->Rents->patchEntity($rent, $this->request->getData());
            if ($this->Rents->save($rent)) {
                $this->Flash->success(__('The rent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rent could not be saved. Please, try again.'));
        }
        $branches = $this->Rents->Branches->find('list', ['limit' => 200]);
        $users = $this->Rents->Users->find('list', ['limit' => 200]);
        $deposits = $this->Rents->Deposits->find('list', ['limit' => 200]);
        $this->set(compact('rent', 'branches', 'users', 'deposits'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rent id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rent = $this->Rents->get($id);
        if ($this->Rents->delete($rent)) {
            $this->Flash->success(__('The rent has been deleted.'));
        } else {
            $this->Flash->error(__('The rent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
