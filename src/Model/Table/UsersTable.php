<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use http\QueryString;

/**
 * Users Model
 *
 * @property \App\Model\Table\CompaniesTable|\Cake\ORM\Association\BelongsTo $Companies
 * @property \App\Model\Table\RentsTable|\Cake\ORM\Association\HasMany $Rents
 * @property \App\Model\Table\AccountsTable|\Cake\ORM\Association\HasMany $Accounts
 * @property \App\Model\Table\BillsTable|\Cake\ORM\Association\HasMany $Bills
 * @property \App\Model\Table\ClientsTable|\Cake\ORM\Association\HasMany $Clients
 * @property \App\Model\Table\ConfiscationsTable|\Cake\ORM\Association\HasMany $Confiscations
 * @property \App\Model\Table\ContactsTable|\Cake\ORM\Association\HasMany $Contacts
 * @property \App\Model\Table\DamagesTable|\Cake\ORM\Association\HasMany $Damages
 * @property \App\Model\Table\DepositsTable|\Cake\ORM\Association\HasMany $Deposits
 * @property \App\Model\Table\EmployeesTable|\Cake\ORM\Association\HasMany $Employees
 * @property \App\Model\Table\EvictionsTable|\Cake\ORM\Association\HasMany $Evictions
 * @property \App\Model\Table\InstallmentsTable|\Cake\ORM\Association\HasMany $Installments
 * @property \App\Model\Table\KinsTable|\Cake\ORM\Association\HasMany $Kins
 * @property \App\Model\Table\LogsTable|\Cake\ORM\Association\HasMany $Logs
 * @property \App\Model\Table\MonthlyPaymentsTable|\Cake\ORM\Association\HasMany $MonthlyPayments
 * @property \App\Model\Table\PasswordsTable|\Cake\ORM\Association\HasMany $Passwords
 * @property \App\Model\Table\PenaltiesTable|\Cake\ORM\Association\HasMany $Penalties
 * @property \App\Model\Table\PropertiesTable|\Cake\ORM\Association\HasMany $Properties
 * @property \App\Model\Table\RefundsTable|\Cake\ORM\Association\HasMany $Refunds
 * @property \App\Model\Table\RequisitionsTable|\Cake\ORM\Association\HasMany $Requisitions
 * @property \App\Model\Table\SecuritiesTable|\Cake\ORM\Association\HasMany $Securities
 * @property \App\Model\Table\TenantsTable|\Cake\ORM\Association\HasMany $Tenants
 * @property \App\Model\Table\UnitsTable|\Cake\ORM\Association\HasMany $Units
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Landlords
 * @property \App\Model\Table\UtilitiesTable|\Cake\ORM\Association\HasMany $Utilities
 * @property \App\Model\Table\PermissionsTable|\Cake\ORM\Association\BelongsToMany $Permissions
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsToMany $Roles
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('full_name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id'
        ]);
        $this->belongsTo('Landlords', [
            'className' => 'Users',
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Accounts', [
            'foreignKey' => 'user_id'
        ]);

        $this->hasMany('Bills', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Clients', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Confiscations', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Contacts', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Damages', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Deposits', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Employees', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Evictions', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Installments', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Kins', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Logs', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('MonthlyPayments', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Passwords', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Penalties', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Properties', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Refunds', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Requisitions', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Securities', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Tenants', [
            'foreignKey' => 'user_id'
        ]);

        $this->hasMany('Units', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Users', [

            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Utilities', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Rents', [
            'foreignKey' => 'occupant_id'
        ]);
        $this->belongsToMany('Permissions', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'permission_id',
            'joinTable' => 'permissions_users'
        ]);
        $this->belongsToMany('Roles', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'role_id',
            'joinTable' => 'roles_users'
        ]);

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'photo' => [
                'fields' => [
                    // if these fields or their defaults exist
                    // the values will be set.
                    'dir' => 'photo_dir', // defaults to `dir`
                    'size' => 'photo_size', // defaults to `size`
                    'type' => 'photo_type', // defaults to `type`
                ],
            ],
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 60)
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 60)
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->scalar('contact')
            ->maxLength('contact', 25)
            ->allowEmpty('contact');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('address')
            ->maxLength('address', 300)
            ->allowEmpty('address');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->allowEmpty('password');

        $validator
            ->scalar('active')
            ->allowEmpty('active');

        $validator
            ->dateTime('created_at')
            ->allowEmpty('created_at');

        $validator
            ->scalar('photo_dir')
            ->maxLength('photo_dir', 60)
            ->allowEmpty('photo_dir');

        $validator
            ->numeric('photo_size')
            ->allowEmpty('photo_size');

        $validator
            ->scalar('photo_type')
            ->maxLength('photo_type', 30)
            ->allowEmpty('photo_type');

        $validator
            ->scalar('type')
            ->allowEmpty('type');

        $validator
            ->scalar('title')
            ->maxLength('title', 80)
            ->allowEmpty('title');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {

        $rules->add($rules->existsIn(['company_id'], 'Companies'));
        $rules->add($rules->existsIn(['user_id'], 'Landlords'));

        return $rules;
    }

    public function findBasicInfo(Query $query, $options = [])
    {
        //$user_id = $options['user_id'];
        return $query->select([
            'id',
            'first_name',
            'last_name',
            'contact',
            'title',
            'email',
            'photo',
            'photo_size',
            'photo_type',
            'address',
            'active',
            'created_at',
            'photo_dir',
             'type'
        ]);
    }

    public function findTenantInfo(Query $query, $options = [])
    {
        $user_id = $options['user_id'] ?? null;

        $query->find('basicInfo')
            ->select([
                'company_id' => 'Companies.name',
                'Company_name' => 'Companies.name'
            ])
            ->select($this->Landlords)//
            ->contain(['Companies', 'Landlords'])
            ->where(['Users.type' => 'tenant']);

        if($user_id){
            $query->where(['Users.user_id' => $user_id]);
        }

        return $query;
    }
}
