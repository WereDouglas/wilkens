<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clients Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\DepositsTable|\Cake\ORM\Association\HasMany $Deposits
 * @property \App\Model\Table\PropertiesTable|\Cake\ORM\Association\HasMany $Properties
 * @property \App\Model\Table\RequisitionsTable|\Cake\ORM\Association\HasMany $Requisitions
 * @property \App\Model\Table\TenantsTable|\Cake\ORM\Association\HasMany $Tenants
 *
 * @method \App\Model\Entity\Client get($primaryKey, $options = [])
 * @method \App\Model\Entity\Client newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Client[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Client|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Client|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Client patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Client[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Client findOrCreate($search, callable $callback = null, $options = [])
 */
class ClientsTable extends Table
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

        $this->setTable('clients');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Deposits', [
            'foreignKey' => 'client_id'
        ]);
        $this->hasMany('Properties', [
            'foreignKey' => 'client_id'
        ]);
        $this->hasMany('Requisitions', [
            'foreignKey' => 'client_id'
        ]);
        $this->hasMany('Tenants', [
            'foreignKey' => 'client_id'
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
            ->numeric('commission')
            ->requirePresence('commission', 'create')
            ->notEmpty('commission');

        $validator
            ->numeric('contract')
            ->requirePresence('contract', 'create')
            ->notEmpty('contract');

        $validator
            ->date('start_date')
            ->requirePresence('start_date', 'create')
            ->notEmpty('start_date');

        $validator
            ->date('end_date')
            ->allowEmpty('end_date');

        $validator
            ->scalar('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        $validator
            ->scalar('payment_terms')
            ->maxLength('payment_terms', 50)
            ->allowEmpty('payment_terms');

        $validator
            ->scalar('code')
            ->maxLength('code', 10)
            ->allowEmpty('code');

        $validator
            ->scalar('delivery_method')
            ->maxLength('delivery_method', 10)
            ->allowEmpty('delivery_method');

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

        return $rules;
    }
}
