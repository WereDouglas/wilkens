<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Confiscations Controller
 *
 * @property \App\Model\Table\ConfiscationsTable $Confiscations
 *
 * @method \App\Model\Entity\Confiscation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConfiscationsController extends AppController
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
        $confiscations = $this->paginate($this->Confiscations);

        $this->set(compact('confiscations'));
    }

    /**
     * View method
     *
     * @param string|null $id Confiscation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $confiscation = $this->Confiscations->get($id, [
            'contain' => ['Tenants']
        ]);

        $this->set('confiscation', $confiscation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $confiscation = $this->Confiscations->newEntity();
        if ($this->request->is('post')) {
            $confiscation = $this->Confiscations->patchEntity($confiscation, $this->request->getData());
            if ($this->Confiscations->save($confiscation)) {
                $this->Flash->success(__('The confiscation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The confiscation could not be saved. Please, try again.'));
        }
        $tenants = $this->Confiscations->Tenants->find('list', ['limit' => 200]);
        $this->set(compact('confiscation', 'tenants'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Confiscation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $confiscation = $this->Confiscations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $confiscation = $this->Confiscations->patchEntity($confiscation, $this->request->getData());
            if ($this->Confiscations->save($confiscation)) {
                $this->Flash->success(__('The confiscation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The confiscation could not be saved. Please, try again.'));
        }
        $tenants = $this->Confiscations->Tenants->find('list', ['limit' => 200]);
        $this->set(compact('confiscation', 'tenants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Confiscation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $confiscation = $this->Confiscations->get($id);
        if ($this->Confiscations->delete($confiscation)) {
            $this->Flash->success(__('The confiscation has been deleted.'));
        } else {
            $this->Flash->error(__('The confiscation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
