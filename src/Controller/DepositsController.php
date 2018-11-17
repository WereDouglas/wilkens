<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Deposits Controller
 *
 * @property \App\Model\Table\DepositsTable $Deposits
 *
 * @method \App\Model\Entity\Deposit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DepositsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Accounts']
        ];
        $deposits = $this->paginate($this->Deposits);

        $this->set(compact('deposits'));
    }

    /**
     * View method
     *
     * @param string|null $id Deposit id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deposit = $this->Deposits->get($id, [
            'contain' => ['Users', 'Accounts']
        ]);

        $this->set('deposit', $deposit);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deposit = $this->Deposits->newEntity();
        if ($this->request->is('post')) {
            $deposit = $this->Deposits->patchEntity($deposit, $this->request->getData());
            if ($this->Deposits->save($deposit)) {
                if ($this->startsWith($this->getRequest()->getRequestTarget(), '/api')) {
                    $id = $deposit->id;
                    $this->set(compact('id'));
                    $this->set('_serialize', 'id');
                    return;
                }
                $this->Flash->success(__('The deposit has been saved.'));

                return $this->redirect(['action' => 'index']);
            } if ($this->startsWith($this->getRequest()->getRequestTarget(), '/api')) {
                // throw new MissingWidgetException();
                $message = 'failed';
                $this->set(compact('message'));
                $this->set('_serialize', 'message');
                return;
            }
            $this->Flash->error(__('The deposit could not be saved. Please, try again.'));
        }
        $users = $this->Deposits->Users->find('list', ['limit' => 200]);
        $accounts = $this->Deposits->Accounts->find('list', ['limit' => 200]);
        $this->set(compact('deposit', 'users', 'accounts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Deposit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deposit = $this->Deposits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deposit = $this->Deposits->patchEntity($deposit, $this->request->getData());
            if ($this->Deposits->save($deposit)) {
                $this->Flash->success(__('The deposit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The deposit could not be saved. Please, try again.'));
        }
        $users = $this->Deposits->Users->find('list', ['limit' => 200]);
        $accounts = $this->Deposits->Accounts->find('list', ['limit' => 200]);
        $this->set(compact('deposit', 'users', 'accounts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Deposit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deposit = $this->Deposits->get($id);
        if ($this->Deposits->delete($deposit)) {
            $this->Flash->success(__('The deposit has been deleted.'));
        } else {
            $this->Flash->error(__('The deposit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
