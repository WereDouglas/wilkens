<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Rents Controller
 *
 * @property \App\Model\Table\RentsTable $Rents
 *
 * @method \App\Model\Entity\Rent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Branches', 'Users', 'Deposits', 'Landlords', 'Occupants']
        ];
        $rents = $this->paginate($this->Rents);

        $this->set(compact('rents'));
    }

    /**
     * View method
     *
     * @param string|null $id Rent id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rent = $this->Rents->get($id, [
            'contain' => ['Branches', 'Users', 'Deposits', 'MonthlyPayments', 'Penalties']
        ]);

        $this->set('rent', $rent);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rent = $this->Rents->newEntity();
        if ($this->request->is('post')) {
            $rent = $this->Rents->patchEntity($rent, $this->request->getData());
            if ($this->Rents->save($rent)) {
                if ($this->startsWith($this->getRequest()->getRequestTarget(), '/api')) {
                    $id = $rent->id;
                    $this->set(compact('id'));
                    $this->set('_serialize', 'id');
                    return;
                }
                $this->Flash->success(__('The rent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            if ($this->startsWith($this->getRequest()->getRequestTarget(), '/api')) {
               // var_dump($rent->getErrors());
                //  exit;
                $message = 'failed';
                $this->set(compact('message'));
                $this->set('_serialize', 'message');
                return;
            }
            $this->Flash->error(__('The rent could not be saved. Please, try again.'));
        }
        $branches = $this->Rents->Branches->find('list', ['limit' => 200]);
        $users = $this->Rents->Users->find('list', ['limit' => 200]);
        $deposits = $this->Rents->Deposits->find('list', ['limit' => 200]);
        $this->set(compact('rent', 'branches', 'users', 'deposits'));
    }
    public function report()
    {
        $rents =Array();
        if ($this->request->is('post')) {
            $values = $this->request->getData();
            echo $start_date= date('Y-m-d',strtotime($values['start_date']));
            echo '<br>';
            echo $end_date= date('Y-m-d',strtotime($values['end_date']));

            $rents = $this->Rents->find('all', [
                'conditions' => ['Rents.date  >=' => $start_date,'Rents.date  <=' => $end_date],
                'contain' => ['Branches', 'Users', 'Deposits', 'Landlords', 'Occupants']
            ]);
            if(!$rents) {
                $this->Flash->error(__('No results.'));

            }
        }

        $this->set(compact('rents', 'branches', 'users', 'deposits'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Rent id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rent = $this->Rents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rent = $this->Rents->patchEntity($rent, $this->request->getData());
            if ($this->Rents->save($rent)) {
                $this->Flash->success(__('The rent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rent could not be saved. Please, try again.'));
        }
        $branches = $this->Rents->Branches->find('list', ['limit' => 200]);
        $users = $this->Rents->Users->find('list', ['limit' => 200]);
        $deposits = $this->Rents->Deposits->find('list', ['limit' => 200]);
        $this->set(compact('rent', 'branches', 'users', 'deposits'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rent id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rent = $this->Rents->get($id);
        if ($this->Rents->delete($rent)) {
            $this->Flash->success(__('The rent has been deleted.'));
        } else {
            $this->Flash->error(__('The rent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
