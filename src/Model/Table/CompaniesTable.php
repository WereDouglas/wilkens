<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Companies Model
 *
 * @property \App\Model\Table\BranchesTable|\Cake\ORM\Association\HasMany $Branches
 * @property \App\Model\Table\DepartmentsTable|\Cake\ORM\Association\HasMany $Departments
 * @property \App\Model\Table\EmployeesTable|\Cake\ORM\Association\HasMany $Employees
 * @property \App\Model\Table\MessagesTable|\Cake\ORM\Association\HasMany $Messages
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Company get($primaryKey, $options = [])
 * @method \App\Model\Entity\Company newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Company[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Company|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Company|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Company patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Company[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Company findOrCreate($search, callable $callback = null, $options = [])
 */
class CompaniesTable extends Table
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

        $this->setTable('companies');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Branches', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('Departments', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('Employees', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('Messages', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'company_id'
        ]);
        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'photo'=> [
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
            ->scalar('name')
            ->maxLength('name', 65)
            ->allowEmpty('name');

        $validator
            ->scalar('address')
            ->maxLength('address', 65)
            ->allowEmpty('address');



        $validator
            ->scalar('photo_dir')
            ->maxLength('photo_dir', 60)
            ->allowEmpty('photo_dir');

        $validator
            ->scalar('photo_size')
            ->maxLength('photo_size', 20)
            ->allowEmpty('photo_size');

        $validator
            ->scalar('photo_type')
            ->maxLength('photo_type', 30)
            ->allowEmpty('photo_type');

        return $validator;
    }
}
