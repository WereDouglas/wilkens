<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $query = $this->Users->find()
            ->select([
                'id',
                'first_name',
                'last_name',
                'contact',
                'type',
                'title',
                'email',
                'photo',
                'photo_size',
                'photo_type',
                'address',
                'active',
                'created_at',
                'photo_dir',
                'company_id' => 'Companies.name',
                'Company_name' => 'Companies.name'
            ])
            ->contain(['Companies']);
        $users = $this->paginate($query);

        $this->set(compact('users', 'current_user'));

        // $user = $this->Users->find('all')
        //      ->contain( ['Companies', 'Permissions', 'Roles', 'Users', 'Accounts', 'Bills', 'Clients', 'Confiscations', 'Contacts', 'Damages', 'Deposits', 'Employees', 'Evictions', 'Installments', 'Kins', 'MonthlyPayments', 'Passwords', 'Penalties', 'Properties', 'Refunds', 'Requisitions', 'Securities', 'Tenants', 'TenantsUnits', 'Units', 'Utilities','Landlords']);
        //  $this->set('users', $user);


    }

    public function client()
    {
        $query = $this->Users->find()
            ->where(['type =' => 'client'])
            ->select([
                'id',
                'first_name',
                'last_name',
                'contact',
                'type',
                'title',
                'email',
                'photo',
                'photo_size',
                'photo_type',
                'address',
                'active',
                'created_at',
                'photo_dir',
                'company_id' => 'Companies.name',
                'Company_name' => 'Companies.name'
            ])
            ->contain(['Companies']);
        $users = $this->paginate($query);


        $this->set(compact('users'));


    }

    public function tenant()
    {
        $query = $this->Users->find()
            ->select([
                'id',
                'first_name',
                'last_name',
                'contact',
                'type',
                'title',
                'email',
                'photo',
                'photo_size',
                'photo_type',
                'address',
                'active',
                'created_at',
                'photo_dir',
                'company_id' => 'Companies.name',
                'Company_name' => 'Companies.name'
            ])
            ->select($this->Users->Landlords)
            ->contain(['Companies', 'Landlords'])
            ->where(['Users.type =' => 'tenant']);
        $users = $this->paginate($query);
        $this->set(compact('users', 'current_user'));


    }

    public function employee()
    {
        $query = $this->Users->find()
            ->where(['type =' => 'employee'])
            ->select([
                'id',
                'first_name',
                'last_name',
                'contact',
                'type',
                'title',
                'email',
                'photo',
                'photo_size',
                'photo_type',
                'address',
                'active',
                'created_at',
                'photo_dir',
                'company_id' => 'Companies.name',
                'Company_name' => 'Companies.name'
            ])
            ->contain(['Companies']);
        $users = $this->paginate($query);

        $this->set(compact('users', 'current_user'));

    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $user = $this->Users->get($id, [
            'contain' => [
                'Companies',
                'Permissions',
                'Rents',
                'Roles',
                'Accounts',
                'Bills',
                'Clients',
                'Confiscations',
                'Contacts',
                'Damages',
                'Deposits',
                'Employees',
                'Evictions',
                'Installments',
                'Kins',
                'MonthlyPayments',
                'Passwords',
                'Penalties',
                'Properties',
                'Refunds',
                'Requisitions',
                'Securities',
                'Tenants',
                'Units',
                'Utilities'
            ]
        ]);
        $tenants = $this->Users->find()
            ->where(['Users.user_id =' => $id])
            ->select([
                'id',
                'property_name' => 'p.name',
                'first_name',
                'last_name',
                'contact',
                'room' => 'u.name',
                'cost' => 'u.cost',
                'security' => 's.amount',
            ])
            ->join(
                [
                    'u' => [
                        'table' => 'units',
                        'type' => 'LEFT',
                        'conditions' => ['u.user_id' => new \Cake\Database\Expression\IdentifierExpression('Users.id')]
                    ],
                    'p' => [
                        'table' => 'properties',
                        'type' => 'LEFT',
                        'conditions' => ['p.id' => new \Cake\Database\Expression\IdentifierExpression('u.property_id')]
                    ],
                    's' => [
                        'table' => 'securities',
                        'type' => 'LEFT',
                        'conditions' => [
                            's.user_id =' => new \Cake\Database\Expression\IdentifierExpression('Users.id')
                        ]
                    ]
                ]);

        $this->set(compact('user', 'tenants'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $query = TableRegistry::get('Users')->find()
                ->where(['id' => $user->id])
                ->first();
            if ($query) {
                if ($this->usingApi) {
                    // var_dump($user->getErrors());
                    // exit;
                    $message = 'exits';
                    $this->set(compact('message'));
                    $this->set('_serialize', 'message');
                    return;
                }
                $this->Flash->error(__('The user could not be saved. Information already saved.'));

            } else {
                if ($this->Users->save($user, ['checkExisting' => true])) {
                    if ($this->usingApi) {
                        $id = $user->id;
                        $this->set(compact('id'));
                        $this->set('_serialize', 'id');
                        return;
                    }
                    $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                if ($this->usingApi) {
                   // var_dump($user->getErrors());
                   // exit;
                    $message = 'failed';
                    $this->set(compact('message'));
                    $this->set('_serialize', 'message');
                    return;
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $companies = $this->Users->Companies->find('list', ['limit' => 200]);
        $permissions = $this->Users->Permissions->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $users = $this->Users->Users->find('list', ['limit' => 200]);
        $this->set(compact('user', 'companies', 'permissions', 'roles', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Permissions', 'Roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData(),
                ['accessibleFields' => ['password' => false]]);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $companies = $this->Users->Companies->find('list', ['limit' => 200]);
        $permissions = $this->Users->Permissions->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $users = $this->Users->Users->find('list', ['limit' => 200]);
        $this->set(compact('user', 'companies', 'permissions', 'roles', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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

    public function login()
    {
        $SessionData = $this->getRequest()->getSession()->read('name');

        if (!empty($SessionData)) {
            $this->redirect(array('controller' => 'users', 'action' => 'index'));
        }
        $this->viewBuilder()->setLayout('');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {

                $this->Auth->setUser($user);
                $current_user = $this->Auth->user('first_name') . ' ' . $this->Auth->user('last_name');
                $user_image = $this->Auth->user('photo_dir') . '' . $this->Auth->user('photo');
                $user_id = $this->Auth->user('id');
                $user_contact = $this->Auth->user('contact');
                $company_id = $this->Auth->user('company_id');

                $session = $this->getRequest()->getSession();
                $companies = TableRegistry::get('Companies');
                $company = $companies->get($company_id);

                $session->write([
                    'name' => $current_user,
                    'image' => $user_image,
                    'contact' => $user_contact,
                    'id' => $user_id,
                    'company_image' => $company['photo_dir'] . '' . $company['photo'],
                    'company_name' => $company['name']
                ]);

                // $values = $this->request->getData();
                if ($this->request->getData('rememberme') == 1) {
                    // remove "remember me checkbox"


                    unset($this->request->data['User']['remember_me']);
                    // hash the user's password
                    $this->request->data['User']['contact'] = $this->Auth->user('contact');

                    $this->Cookie->write('remember_me_cookie', $this->request->data['User'], true, '2 weeks');
                    //   var_dump( $this->Cookie->read('remember_me_cookie'));
                    //   exit();

                    //  unset($this->request->getData(['User']['rememberme']);
                    // write the cookie
                    $this->Cookie->write('remember_me_cookie', $this->Auth->user('id'), true, '2 weeks');
                    //echo $this->Cookie->read('remember_me_cookie');

                }

                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('Invalid username or password, try again'));
            }
        }
    }

    public function logout()
    {
        // $this->Cookie->delete('remember_me_cookie');
        $session = $this->request->session();
        $session->destroy();
        return $this->redirect($this->Auth->logout());
    }
    public function edits($id = null)
    {

        if ($this->request->is(['patch', 'post', 'put'])) {

            $user = $this->Users->get($id, [
                'contain' => ['Permissions', 'Roles']
            ]);

            $user = $this->Users->patchEntity($user, $this->request->getData(),
                ['accessibleFields' => ['password' => false]]);
            if ($this->Users->save($user)) {
                echo json_encode($this->request->getData());
            }
            echo json_encode($this->request->getData());
        }
        echo json_encode($this->request->getData());

    }

}
