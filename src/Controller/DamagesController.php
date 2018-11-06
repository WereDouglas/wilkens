<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Damages Controller
 *
 * @property \App\Model\Table\DamagesTable $Damages
 *
 * @method \App\Model\Entity\Damage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DamagesController extends AppController
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
        $damages = $this->paginate($this->Damages);

        $this->set(compact('damages'));
    }

    /**
     * View method
     *
     * @param string|null $id Damage id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $damage = $this->Damages->get($id, [
            'contain' => ['Tenants']
        ]);

        $this->set('damage', $damage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $damage = $this->Damages->newEntity();
        if ($this->request->is('post')) {
            $damage = $this->Damages->patchEntity($damage, $this->request->getData());
            if ($this->Damages->save($damage)) {
                $this->Flash->success(__('The damage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The damage could not be saved. Please, try again.'));
        }
        $tenants = $this->Damages->Tenants->find('list', ['limit' => 200]);
        $this->set(compact('damage', 'tenants'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Damage id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $damage = $this->Damages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $damage = $this->Damages->patchEntity($damage, $this->request->getData());
            if ($this->Damages->save($damage)) {
                $this->Flash->success(__('The damage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The damage could not be saved. Please, try again.'));
        }
        $tenants = $this->Damages->Tenants->find('list', ['limit' => 200]);
        $this->set(compact('damage', 'tenants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Damage id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $damage = $this->Damages->get($id);
        if ($this->Damages->delete($damage)) {
            $this->Flash->success(__('The damage has been deleted.'));
        } else {
            $this->Flash->error(__('The damage could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
