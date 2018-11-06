<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Penalties Controller
 *
 * @property \App\Model\Table\PenaltiesTable $Penalties
 *
 * @method \App\Model\Entity\Penalty[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PenaltiesController extends AppController
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
        $penalties = $this->paginate($this->Penalties);

        $this->set(compact('penalties'));
    }

    /**
     * View method
     *
     * @param string|null $id Penalty id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $penalty = $this->Penalties->get($id, [
            'contain' => ['Tenants']
        ]);

        $this->set('penalty', $penalty);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $penalty = $this->Penalties->newEntity();
        if ($this->request->is('post')) {
            $penalty = $this->Penalties->patchEntity($penalty, $this->request->getData());
            if ($this->Penalties->save($penalty)) {
                $this->Flash->success(__('The penalty has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The penalty could not be saved. Please, try again.'));
        }
        $tenants = $this->Penalties->Tenants->find('list', ['limit' => 200]);
        $this->set(compact('penalty', 'tenants'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Penalty id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $penalty = $this->Penalties->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $penalty = $this->Penalties->patchEntity($penalty, $this->request->getData());
            if ($this->Penalties->save($penalty)) {
                $this->Flash->success(__('The penalty has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The penalty could not be saved. Please, try again.'));
        }
        $tenants = $this->Penalties->Tenants->find('list', ['limit' => 200]);
        $this->set(compact('penalty', 'tenants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Penalty id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $penalty = $this->Penalties->get($id);
        if ($this->Penalties->delete($penalty)) {
            $this->Flash->success(__('The penalty has been deleted.'));
        } else {
            $this->Flash->error(__('The penalty could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
