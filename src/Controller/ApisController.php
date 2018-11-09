<?php

namespace App\Controller;

use App\Controller\AppController;
use RestApi\Controller\ApiController;


class ApisController extends ApiController
{


    public function ListUsers()
    {
        $this->loadModel('Users');
        $users=$this->Users->find();
        $this->apiResponse['users'] = $users;
    }

    public function addUsers()
    {
        $this->request->allowMethod('post');
        $this->loadModel('Users');
        $user = $this->Users->newEntity();

        $user = $this->Users->patchEntity($user, $this->request->getData());
        try {
            if ($this->Users->save($user)) {
                $this->apiResponse['message'] = 'Registered successfully.';
                $payload = ['email' => $user->email, 'first_name' => $user->first_name];
                $this->apiResponse['token'] = JwtToken::generateToken($payload);
            } else {
                $this->httpStatusCode = 400;
                $this->apiResponse['message'] = 'Unable to register user.';
                if ($user->errors()) {
                    $this->apiResponse['message'] = 'Validation failed.';
                    foreach ($user->errors() as $field => $validationMessage) {
                        $this->apiResponse['error'][$field] = $validationMessage[key($validationMessage)];
                    }
                }
            }
        } catch (Exception $e) {
            $this->httpStatusCode = 400;
            $this->apiResponse['message'] = 'Unable to register user.';
        }
        unset($user);
        unset($payload);
    }

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Companies', 'Permissions', 'Roles', 'Accounts', 'Clients', 'Contacts', 'Employees', 'Kins', 'Passwords', 'Tenants']
        ]);

        $this->set('user', $user);
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $companies = $this->Users->Companies->find('list', ['limit' => 200]);
        $permissions = $this->Users->Permissions->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'companies', 'permissions', 'roles'));
    }

    public function edit($id = null)
    {
        $ids = $id;
        $user = $this->Users->get($id, [
            'contain' => ['Permissions', 'Roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $companies = $this->Users->Companies->find('list', ['limit' => 200]);
        $permissions = $this->Users->Permissions->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'companies', 'permissions', 'roles', 'ids'));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
