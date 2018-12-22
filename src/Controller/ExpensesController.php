<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Expenses Controller
 *
 * @property \App\Model\Table\ExpensesTable $Expenses
 *
 * @method \App\Model\Entity\Expense[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExpensesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Requisitions']
        ];
        $expenses = $this->paginate($this->Expenses);

        $this->set(compact('expenses'));
    }

    /**
     * View method
     *
     * @param string|null $id Expense id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $expense = $this->Expenses->get($id, [
            'contain' => ['Requisitions']
        ]);

        $this->set('expense', $expense);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $expense = $this->Expenses->newEntity();
        if ($this->request->is('post')) {
            $expense = $this->Expenses->patchEntity($expense, $this->request->getData());
            if ($this->Expenses->save($expense)) {
                if ($this->usingApi) {
                    $id = $expense->id;
                    $this->set(compact('id'));
                    $this->set('_serialize', 'id');
                    return;
                }
                $this->Flash->success(__('The expense has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            if ($this->usingApi) {
                // var_dump($expense->getErrors());
                // exit;
                $message = 'failed';
                $this->set(compact('message'));
                $this->set('_serialize', 'message');
                return;
            }
            $this->Flash->error(__('The expense could not be saved. Please, try again.'));
        }
        $requisitions = $this->Expenses->Requisitions->find('list', ['limit' => 200]);
        $this->set(compact('expense', 'requisitions'));
    }
    public function expense()
    {
        $rents = Array();
        if ($this->request->is('post')) {
            $values = $this->request->getData();
            $start_date = date('Y-m-d', strtotime($values['start_date']));
            //   echo '<br>';
            $end_date = date('Y-m-d', strtotime($values['end_date']));

            $requisitions = TableRegistry::getTableLocator()->get('Requisitions')->find('all', [
                'conditions' => [
                    'date  >=' => $start_date,
                    'date  <=' => $end_date,
                    'paid  =' => 'no',
                    'user_id' => $values['user_id']
                ]
            ])->select([
                'id'=> 'Requisitions.id',
                'date' => 'Requisitions.date',
                'type' => 'Requisitions.type',
                'approved' => 'Requisitions.approved',
                'paid' => 'Requisitions.paid',
                'repaired' => 'Requisitions.repaired',
                'method' => 'Requisitions.method',
                'details' => 'Requisitions.details',
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
            $client = TableRegistry::getTableLocator()->get('Users')->get($values['user_id']);

        }
        if (!$requisitions) {
            $this->Flash->error(__('No results.'));

        }
        $users = TableRegistry::get('Users')->find('all', [
            'conditions' => ['Users.type =' => 'client'],
            'keyField' => 'id',
            'valueField' => 'first_name'
        ]);
        $this->set(compact( 'users',  'requisitions',  'end_date', 'start_date', 'client'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Expense id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $expense = $this->Expenses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $expense = $this->Expenses->patchEntity($expense, $this->request->getData());
            if ($this->Expenses->save($expense)) {
                $this->Flash->success(__('The expense has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The expense could not be saved. Please, try again.'));
        }
        $requisitions = $this->Expenses->Requisitions->find('list', ['limit' => 200]);
        $this->set(compact('expense', 'requisitions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Expense id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $expense = $this->Expenses->get($id);
        if ($this->Expenses->delete($expense)) {
            $this->Flash->success(__('The expense has been deleted.'));
        } else {
            $this->Flash->error(__('The expense could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
