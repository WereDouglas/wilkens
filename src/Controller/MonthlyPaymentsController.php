<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MonthlyPayments Controller
 *
 * @property \App\Model\Table\MonthlyPaymentsTable $MonthlyPayments
 *
 * @method \App\Model\Entity\MonthlyPayment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MonthlyPaymentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Rents']
        ];
        $monthlyPayments = $this->paginate($this->MonthlyPayments);

        $this->set(compact('monthlyPayments'));
    }

    /**
     * View method
     *
     * @param string|null $id Monthly Payment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $monthlyPayment = $this->MonthlyPayments->get($id, [
            'contain' => ['Rents']
        ]);

        $this->set('monthlyPayment', $monthlyPayment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $monthlyPayment = $this->MonthlyPayments->newEntity();
        if ($this->request->is('post')) {
            $monthlyPayment = $this->MonthlyPayments->patchEntity($monthlyPayment, $this->request->getData());
            if ($this->MonthlyPayments->save($monthlyPayment)) {
                $this->Flash->success(__('The monthly payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The monthly payment could not be saved. Please, try again.'));
        }
        $rents = $this->MonthlyPayments->Rents->find('list', ['limit' => 200]);
        $this->set(compact('monthlyPayment', 'rents'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Monthly Payment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $monthlyPayment = $this->MonthlyPayments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $monthlyPayment = $this->MonthlyPayments->patchEntity($monthlyPayment, $this->request->getData());
            if ($this->MonthlyPayments->save($monthlyPayment)) {
                $this->Flash->success(__('The monthly payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The monthly payment could not be saved. Please, try again.'));
        }
        $rents = $this->MonthlyPayments->Rents->find('list', ['limit' => 200]);
        $this->set(compact('monthlyPayment', 'rents'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Monthly Payment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $monthlyPayment = $this->MonthlyPayments->get($id);
        if ($this->MonthlyPayments->delete($monthlyPayment)) {
            $this->Flash->success(__('The monthly payment has been deleted.'));
        } else {
            $this->Flash->error(__('The monthly payment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
