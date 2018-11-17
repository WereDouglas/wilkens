<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TenantsUnits Controller
 *
 * @property \App\Model\Table\TenantsUnitsTable $TenantsUnits
 *
 * @method \App\Model\Entity\TenantsUnit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TenantsUnitsController extends AppController
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
        $tenantsUnits = $this->paginate($this->TenantsUnits);

        $this->set(compact('tenantsUnits'));
    }

    /**
     * View method
     *
     * @param string|null $id Tenants Unit id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tenantsUnit = $this->TenantsUnits->get($id, [
            'contain' => ['Units', 'Users']
        ]);

        $this->set('tenantsUnit', $tenantsUnit);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tenantsUnit = $this->TenantsUnits->newEntity();
        if ($this->request->is('post')) {
            $tenantsUnit = $this->TenantsUnits->patchEntity($tenantsUnit, $this->request->getData());
            if ($this->TenantsUnits->save($tenantsUnit)) {
                $this->Flash->success(__('The tenants unit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tenants unit could not be saved. Please, try again.'));
        }
        $units = $this->TenantsUnits->Units->find('list', ['limit' => 200]);
        $users = $this->TenantsUnits->Users->find('list', ['limit' => 200]);
        $this->set(compact('tenantsUnit', 'units', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tenants Unit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tenantsUnit = $this->TenantsUnits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tenantsUnit = $this->TenantsUnits->patchEntity($tenantsUnit, $this->request->getData());
            if ($this->TenantsUnits->save($tenantsUnit)) {
                $this->Flash->success(__('The tenants unit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tenants unit could not be saved. Please, try again.'));
        }
        $units = $this->TenantsUnits->Units->find('list', ['limit' => 200]);
        $users = $this->TenantsUnits->Users->find('list', ['limit' => 200]);
        $this->set(compact('tenantsUnit', 'units', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tenants Unit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tenantsUnit = $this->TenantsUnits->get($id);
        if ($this->TenantsUnits->delete($tenantsUnit)) {
            $this->Flash->success(__('The tenants unit has been deleted.'));
        } else {
            $this->Flash->error(__('The tenants unit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
