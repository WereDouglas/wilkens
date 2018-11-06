<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Requisitions Controller
 *
 * @property \App\Model\Table\RequisitionsTable $Requisitions
 *
 * @method \App\Model\Entity\Requisition[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RequisitionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['RequestedBies', 'Managers', 'Clients', 'Companies', 'Properties']
        ];
        $requisitions = $this->paginate($this->Requisitions);

        $this->set(compact('requisitions'));
    }

    /**
     * View method
     *
     * @param string|null $id Requisition id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requisition = $this->Requisitions->get($id, [
            'contain' => ['RequestedBies', 'Managers', 'Clients', 'Companies', 'Properties', 'Expenses']
        ]);

        $this->set('requisition', $requisition);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requisition = $this->Requisitions->newEntity();
        if ($this->request->is('post')) {
            $requisition = $this->Requisitions->patchEntity($requisition, $this->request->getData());
            if ($this->Requisitions->save($requisition)) {
                $this->Flash->success(__('The requisition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requisition could not be saved. Please, try again.'));
        }
        $requestedBies = $this->Requisitions->RequestedBies->find('list', ['limit' => 200]);
        $managers = $this->Requisitions->Managers->find('list', ['limit' => 200]);
        $clients = $this->Requisitions->Clients->find('list', ['limit' => 200]);
        $companies = $this->Requisitions->Companies->find('list', ['limit' => 200]);
        $properties = $this->Requisitions->Properties->find('list', ['limit' => 200]);
        $this->set(compact('requisition', 'requestedBies', 'managers', 'clients', 'companies', 'properties'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Requisition id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requisition = $this->Requisitions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requisition = $this->Requisitions->patchEntity($requisition, $this->request->getData());
            if ($this->Requisitions->save($requisition)) {
                $this->Flash->success(__('The requisition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requisition could not be saved. Please, try again.'));
        }
        $requestedBies = $this->Requisitions->RequestedBies->find('list', ['limit' => 200]);
        $managers = $this->Requisitions->Managers->find('list', ['limit' => 200]);
        $clients = $this->Requisitions->Clients->find('list', ['limit' => 200]);
        $companies = $this->Requisitions->Companies->find('list', ['limit' => 200]);
        $properties = $this->Requisitions->Properties->find('list', ['limit' => 200]);
        $this->set(compact('requisition', 'requestedBies', 'managers', 'clients', 'companies', 'properties'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Requisition id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requisition = $this->Requisitions->get($id);
        if ($this->Requisitions->delete($requisition)) {
            $this->Flash->success(__('The requisition has been deleted.'));
        } else {
            $this->Flash->error(__('The requisition could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
