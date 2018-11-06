<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Evictions Controller
 *
 * @property \App\Model\Table\EvictionsTable $Evictions
 *
 * @method \App\Model\Entity\Eviction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EvictionsController extends AppController
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
        $evictions = $this->paginate($this->Evictions);

        $this->set(compact('evictions'));
    }

    /**
     * View method
     *
     * @param string|null $id Eviction id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eviction = $this->Evictions->get($id, [
            'contain' => ['Tenants']
        ]);

        $this->set('eviction', $eviction);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eviction = $this->Evictions->newEntity();
        if ($this->request->is('post')) {
            $eviction = $this->Evictions->patchEntity($eviction, $this->request->getData());
            if ($this->Evictions->save($eviction)) {
                $this->Flash->success(__('The eviction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The eviction could not be saved. Please, try again.'));
        }
        $tenants = $this->Evictions->Tenants->find('list', ['limit' => 200]);
        $this->set(compact('eviction', 'tenants'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Eviction id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eviction = $this->Evictions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eviction = $this->Evictions->patchEntity($eviction, $this->request->getData());
            if ($this->Evictions->save($eviction)) {
                $this->Flash->success(__('The eviction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The eviction could not be saved. Please, try again.'));
        }
        $tenants = $this->Evictions->Tenants->find('list', ['limit' => 200]);
        $this->set(compact('eviction', 'tenants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Eviction id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eviction = $this->Evictions->get($id);
        if ($this->Evictions->delete($eviction)) {
            $this->Flash->success(__('The eviction has been deleted.'));
        } else {
            $this->Flash->error(__('The eviction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
