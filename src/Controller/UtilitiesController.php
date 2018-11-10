<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Utilities Controller
 *
 * @property \App\Model\Table\UtilitiesTable $Utilities
 *
 * @method \App\Model\Entity\Utility[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UtilitiesController extends AppController
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
        $utilities = $this->paginate($this->Utilities);

        $this->set(compact('utilities'));
    }

    /**
     * View method
     *
     * @param string|null $id Utility id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $utility = $this->Utilities->get($id, [
            'contain' => ['Tenants']
        ]);

        $this->set('utility', $utility);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $utility = $this->Utilities->newEntity();
        if ($this->request->is('post')) {
            $utility = $this->Utilities->patchEntity($utility, $this->request->getData());
            if ($this->Utilities->save($utility)) {
                $this->Flash->success(__('The utility has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The utility could not be saved. Please, try again.'));
        }
        $tenants = $this->Utilities->Tenants->find('list', ['limit' => 200]);
        $this->set(compact('utility', 'tenants'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Utility id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $utility = $this->Utilities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $utility = $this->Utilities->patchEntity($utility, $this->request->getData());
            if ($this->Utilities->save($utility)) {
                $this->Flash->success(__('The utility has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The utility could not be saved. Please, try again.'));
        }
        $tenants = $this->Utilities->Tenants->find('list', ['limit' => 200]);
        $this->set(compact('utility', 'tenants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Utility id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $utility = $this->Utilities->get($id);
        if ($this->Utilities->delete($utility)) {
            $this->Flash->success(__('The utility has been deleted.'));
        } else {
            $this->Flash->error(__('The utility could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}