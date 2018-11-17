<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UnitsHasUsers Controller
 *
 * @property \App\Model\Table\UnitsHasUsersTable $UnitsHasUsers
 *
 * @method \App\Model\Entity\UnitsHasUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UnitsHasUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Units', 'Users']
        ];
        $unitsHasUsers = $this->paginate($this->UnitsHasUsers);

        $this->set(compact('unitsHasUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Units Has User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $unitsHasUser = $this->UnitsHasUsers->get($id, [
            'contain' => ['Units', 'Users']
        ]);

        $this->set('unitsHasUser', $unitsHasUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $unitsHasUser = $this->UnitsHasUsers->newEntity();
        if ($this->request->is('post')) {
            $unitsHasUser = $this->UnitsHasUsers->patchEntity($unitsHasUser, $this->request->getData());
            if ($this->UnitsHasUsers->save($unitsHasUser)) {
                $this->Flash->success(__('The units has user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The units has user could not be saved. Please, try again.'));
        }
        $units = $this->UnitsHasUsers->Units->find('list', ['limit' => 200]);
        $users = $this->UnitsHasUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('unitsHasUser', 'units', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Units Has User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $unitsHasUser = $this->UnitsHasUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $unitsHasUser = $this->UnitsHasUsers->patchEntity($unitsHasUser, $this->request->getData());
            if ($this->UnitsHasUsers->save($unitsHasUser)) {
                $this->Flash->success(__('The units has user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The units has user could not be saved. Please, try again.'));
        }
        $units = $this->UnitsHasUsers->Units->find('list', ['limit' => 200]);
        $users = $this->UnitsHasUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('unitsHasUser', 'units', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Units Has User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $unitsHasUser = $this->UnitsHasUsers->get($id);
        if ($this->UnitsHasUsers->delete($unitsHasUser)) {
            $this->Flash->success(__('The units has user has been deleted.'));
        } else {
            $this->Flash->error(__('The units has user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
