<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 *
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        $query = $this->Employees->find()
            ->select(['user_name' => 'Users.first_name', 'id', 'company_name' => 'Companies.name', 'branch' => 'Branches.name', 'department' => 'Departments.name', 'start_date', 'end_date', 'active', 'address', 'no', 'created_at','photo'=>'Users.photo','photo_dir'=>'Users.photo_dir',])
            ->contain(['Users', 'Companies', 'Branches', 'Departments']);

        $employees = $this->paginate($query);
        $this->set(compact('employees'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['Users', 'Companies', 'Branches', 'Departments']
        ]);

        $this->set('employee', $employee);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employee = $this->Employees->newEntity();
        if ($this->request->is('post')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $users = $this->Employees->Users->find('list', ['limit' => 200]);
        $companies = $this->Employees->Companies->find('list', ['limit' => 200]);
        $branches = $this->Employees->Branches->find('list', ['limit' => 200]);
        $departments = $this->Employees->Departments->find('list', ['limit' => 200]);
        $this->set(compact('employee', 'users', 'companies', 'branches', 'departments'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $users = $this->Employees->Users->find('list', ['limit' => 200]);
        $companies = $this->Employees->Companies->find('list', ['limit' => 200]);
        $branches = $this->Employees->Branches->find('list', ['limit' => 200]);
        $departments = $this->Employees->Departments->find('list', ['limit' => 200]);
        $this->set(compact('employee', 'users', 'companies', 'branches', 'departments'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
