<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Passwords Controller
 *
 * @property \App\Model\Table\PasswordsTable $Passwords
 *
 * @method \App\Model\Entity\Password[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PasswordsController extends AppController
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
        $passwords = $this->paginate($this->Passwords);

        $this->set(compact('passwords'));
    }

    /**
     * View method
     *
     * @param string|null $id Password id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $password = $this->Passwords->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('password', $password);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $password = $this->Passwords->newEntity();
        if ($this->request->is('post')) {
            $password = $this->Passwords->patchEntity($password, $this->request->getData());
            if ($this->Passwords->save($password)) {
                $this->Flash->success(__('The password has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The password could not be saved. Please, try again.'));
        }
        $users = $this->Passwords->Users->find('list', ['limit' => 200]);
        $this->set(compact('password', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Password id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $password = $this->Passwords->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $password = $this->Passwords->patchEntity($password, $this->request->getData());
            if ($this->Passwords->save($password)) {
                $this->Flash->success(__('The password has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The password could not be saved. Please, try again.'));
        }
        $users = $this->Passwords->Users->find('list', ['limit' => 200]);
        $this->set(compact('password', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Password id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $password = $this->Passwords->get($id);
        if ($this->Passwords->delete($password)) {
            $this->Flash->success(__('The password has been deleted.'));
        } else {
            $this->Flash->error(__('The password could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
