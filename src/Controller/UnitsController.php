<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Units Controller
 *
 * @property \App\Model\Table\UnitsTable $Units
 *
 * @method \App\Model\Entity\Unit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UnitsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Properties', 'Users']
        ];
        $units = $this->paginate($this->Units);

        $this->set(compact('units'));
    }

    /**
     * View method
     *
     * @param string|null $id Unit id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $unit = $this->Units->get($id, [
            'contain' => ['Properties', 'Users', 'Tenants', 'Rents', 'Requisitions']
        ]);

        $this->set('unit', $unit);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $unit = $this->Units->newEntity();
        if ($this->request->is('post')) {
            $unit = $this->Units->patchEntity($unit, $this->request->getData());
            if ($this->Units->save($unit)) {
                if ($this->usingApi) {
                    $id = $unit->id;
                    $this->set(compact('id'));
                    $this->set('_serialize', 'id');
                    return;
                }
                $this->Flash->success(__('The unit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            if ($this->usingApi) {
                var_dump($unit->getErrors());
                exit;
                $message = 'failed';
                $this->set(compact('message'));
                $this->set('_serialize', 'message');
                return;
            }
            $this->Flash->error(__('The unit could not be saved. Please, try again.'));
        }
        $properties = $this->Units->Properties->find('list', ['limit' => 200]);
        $users = $this->Units->Users->find('list', ['limit' => 200]);
        $tenants = $this->Units->Tenants->find('list', ['limit' => 200]);
        $this->set(compact('unit', 'properties', 'users', 'tenants'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Unit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $unit = $this->Units->get($id, [
            'contain' => ['Tenants']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $unit = $this->Units->patchEntity($unit, $this->request->getData());
            if ($this->Units->save($unit)) {
                $this->Flash->success(__('The unit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The unit could not be saved. Please, try again.'));
        }
        $properties = $this->Units->Properties->find('list', ['limit' => 200]);
        $users = $this->Units->Users->find('list', ['limit' => 200]);
        $tenants = $this->Units->Tenants->find('list', ['limit' => 200]);
        $this->set(compact('unit', 'properties', 'users', 'tenants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Unit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $unit = $this->Units->get($id);
        if ($this->Units->delete($unit)) {
            $this->Flash->success(__('The unit has been deleted.'));
        } else {
            $this->Flash->error(__('The unit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
