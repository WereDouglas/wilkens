<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Refunds Controller
 *
 * @property \App\Model\Table\RefundsTable $Refunds
 *
 * @method \App\Model\Entity\Refund[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RefundsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tenants']
        ];
        $refunds = $this->paginate($this->Refunds);

        $this->set(compact('refunds'));
    }

    /**
     * View method
     *
     * @param string|null $id Refund id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $refund = $this->Refunds->get($id, [
            'contain' => ['Tenants']
        ]);

        $this->set('refund', $refund);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $refund = $this->Refunds->newEntity();
        if ($this->request->is('post')) {
            $refund = $this->Refunds->patchEntity($refund, $this->request->getData());
            if ($this->Refunds->save($refund)) {
                $this->Flash->success(__('The refund has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The refund could not be saved. Please, try again.'));
        }
        $tenants = $this->Refunds->Tenants->find('list', ['limit' => 200]);
        $this->set(compact('refund', 'tenants'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Refund id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $refund = $this->Refunds->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $refund = $this->Refunds->patchEntity($refund, $this->request->getData());
            if ($this->Refunds->save($refund)) {
                $this->Flash->success(__('The refund has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The refund could not be saved. Please, try again.'));
        }
        $tenants = $this->Refunds->Tenants->find('list', ['limit' => 200]);
        $this->set(compact('refund', 'tenants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Refund id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $refund = $this->Refunds->get($id);
        if ($this->Refunds->delete($refund)) {
            $this->Flash->success(__('The refund has been deleted.'));
        } else {
            $this->Flash->error(__('The refund could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
