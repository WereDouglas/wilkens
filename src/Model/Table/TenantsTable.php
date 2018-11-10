<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tenants Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ClientsTable|\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\ConfiscationsTable|\Cake\ORM\Association\HasMany $Confiscations
 * @property \App\Model\Table\DamagesTable|\Cake\ORM\Association\HasMany $Damages
 * @property \App\Model\Table\EvictionsTable|\Cake\ORM\Association\HasMany $Evictions
 * @property \App\Model\Table\PenaltiesTable|\Cake\ORM\Association\HasMany $Penalties
 * @property \App\Model\Table\RefundsTable|\Cake\ORM\Association\HasMany $Refunds
 * @property \App\Model\Table\RentsTable|\Cake\ORM\Association\HasMany $Rents
 * @property \App\Model\Table\SecuritiesTable|\Cake\ORM\Association\HasMany $Securities
 * @property \App\Model\Table\UtilitiesTable|\Cake\ORM\Association\HasMany $Utilities
 * @property \App\Model\Table\UnitsTable|\Cake\ORM\Association\BelongsToMany $Units
 *
 * @method \App\Model\Entity\Tenant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tenant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tenant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tenant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tenant|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tenant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tenant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tenant findOrCreate($search, callable $callback = null, $options = [])
 */
class TenantsTable extends Table
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

        $this->setTable('tenants');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Confiscations', [
            'foreignKey' => 'tenant_id'
        ]);
        $this->hasMany('Damages', [
            'foreignKey' => 'tenant_id'
        ]);
        $this->hasMany('Evictions', [
            'foreignKey' => 'tenant_id'
        ]);
        $this->hasMany('Penalties', [
            'foreignKey' => 'tenant_id'
        ]);
        $this->hasMany('Refunds', [
            'foreignKey' => 'tenant_id'
        ]);
        $this->hasMany('Rents', [
            'foreignKey' => 'tenant_id'
        ]);
        $this->hasMany('Securities', [
            'foreignKey' => 'tenant_id'
        ]);
        $this->hasMany('Utilities', [
            'foreignKey' => 'tenant_id'
        ]);
        $this->belongsToMany('Units', [
            'foreignKey' => 'tenant_id',
            'targetForeignKey' => 'unit_id',
            'joinTable' => 'tenants_units'
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
            ->scalar('start_date')
            ->maxLength('start_date', 10)
            ->requirePresence('start_date', 'create')
            ->notEmpty('start_date');

        $validator
            ->scalar('end_date')
            ->maxLength('end_date', 10)
            ->requirePresence('end_date', 'create')
            ->notEmpty('end_date');

        $validator
            ->scalar('rent_start_due_day')
            ->maxLength('rent_start_due_day', 10)
            ->requirePresence('rent_start_due_day', 'create')
            ->notEmpty('rent_start_due_day');

        $validator
            ->scalar('active')
            ->allowEmpty('active');

        $validator
            ->scalar('notice')
            ->allowEmpty('notice');

        $validator
            ->scalar('amount_to_pay')
            ->maxLength('amount_to_pay', 1000)
            ->requirePresence('amount_to_pay', 'create')
            ->notEmpty('amount_to_pay');

        $validator
            ->scalar('work_address')
            ->maxLength('work_address', 60)
            ->allowEmpty('work_address');

        $validator
            ->scalar('nin')
            ->maxLength('nin', 50)
            ->allowEmpty('nin');

        $validator
            ->scalar('passport')
            ->maxLength('passport', 50)
            ->allowEmpty('passport');

        $validator
            ->dateTime('created_at')
            ->allowEmpty('created_at');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['client_id'], 'Clients'));

        return $rules;
    }
}
