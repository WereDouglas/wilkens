<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\ORM\Query;

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
        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d');
        $user_id = null;
        if ($this->request->is('post')) {
            $values = $this->request->getData();
            $start_date = date('Y-m-d', strtotime($values['start_date']));
            $end_date = date('Y-m-d', strtotime($values['end_date']));
            $user_id = $values['user_id'];
        }
        $requisitions = $this->Requisitions->find()
            ->enableAutoFields()
            ->contain([
                'Users',
                'Properties',
                'Units',
                'Approveds',
                'Paids',
                'Requesteds',
                'Expenses'
            ])
            ->where([
                'date  >=' => $start_date,
                'date  <=' => $end_date,
                'Requisitions.user_id' => $user_id
            ]);

      /*  echo '<pre>';
        var_dump($requisitions);
        exit;*/


        $users = TableRegistry::getTableLocator()->get('Users')->find('all', [
            'conditions' => ['Users.type =' => 'client'],
            'keyField' => 'id',
            'valueField' => 'first_name'
        ]);

        $this->set(compact('requisitions', 'users'));
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
            'contain' => ['Users', 'Properties', 'Units', 'Expenses', 'Approveds', 'Paids', 'Requesteds']
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
                if ($this->startsWith($this->getRequest()->getRequestTarget(), '/api')) {

                    $query = TableRegistry::get('Requisitions')->find()
                        ->where(['id' => $requisition->id])
                        ->first();
                    $no = $query->no;
                    $this->set(compact('no'));
                    $this->set('_serialize', 'no');
                    return;
                }
                $this->Flash->success(__('The requisition has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            if ($this->startsWith($this->getRequest()->getRequestTarget(), '/api')) {
                // var_dump($requisition->getErrors());
                //  exit;
                $message = 'failed';
                $this->set(compact('message'));
                $this->set('_serialize', 'message');
                return;
            }
            $this->Flash->error(__('The requisition could not be saved. Please, try again.'));
        }
        $users = $this->Requisitions->Users->find('list', ['limit' => 200]);
        $properties = $this->Requisitions->Properties->find('list', ['limit' => 200]);
        $units = $this->Requisitions->Units->find('list', ['limit' => 200]);
        $this->set(compact('requisition', 'users', 'properties', 'units'));
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
        $users = $this->Requisitions->Users->find('list', ['limit' => 200]);
        $properties = $this->Requisitions->Properties->find('list', ['limit' => 200]);
        $units = $this->Requisitions->Units->find('list', ['limit' => 200]);
        $this->set(compact('requisition', 'users', 'properties', 'units'));
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
