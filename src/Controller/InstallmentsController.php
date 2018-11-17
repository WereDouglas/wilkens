<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Installments Controller
 *
 * @property \App\Model\Table\InstallmentsTable $Installments
 *
 * @method \App\Model\Entity\Installment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InstallmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $installments = $this->paginate($this->Installments);

        $this->set(compact('installments'));
    }

    /**
     * View method
     *
     * @param string|null $id Installment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $installment = $this->Installments->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('installment', $installment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $installment = $this->Installments->newEntity();
        if ($this->request->is('post')) {
            $installment = $this->Installments->patchEntity($installment, $this->request->getData());
            if ($this->Installments->save($installment)) {
                if ($this->startsWith($this->getRequest()->getRequestTarget(), '/api')) {
                    $id = $installment->id;
                    $this->set(compact('id'));
                    $this->set('_serialize', 'id');
                    return;
                }
                $this->Flash->success(__('The installment has been saved.'));
                return $this->redirect(['action' => 'index']);
            } if ($this->startsWith($this->getRequest()->getRequestTarget(), '/api')) {
                // throw new MissingWidgetException();
                $message = 'failed';
                $this->set(compact('message'));
                $this->set('_serialize', 'message');
                return;
            }
            $this->Flash->error(__('The installment could not be saved. Please, try again.'));
        }
        $users = $this->Installments->Users->find('list', ['limit' => 200]);
        $this->set(compact('installment', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Installment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $installment = $this->Installments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $installment = $this->Installments->patchEntity($installment, $this->request->getData());
            if ($this->Installments->save($installment)) {
                $this->Flash->success(__('The installment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The installment could not be saved. Please, try again.'));
        }
        $users = $this->Installments->Users->find('list', ['limit' => 200]);
        $this->set(compact('installment', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Installment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $installment = $this->Installments->get($id);
        if ($this->Installments->delete($installment)) {
            $this->Flash->success(__('The installment has been deleted.'));
        } else {
            $this->Flash->error(__('The installment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
