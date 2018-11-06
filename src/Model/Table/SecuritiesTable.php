<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Securities Model
 *
 * @property \App\Model\Table\TenantsTable|\Cake\ORM\Association\BelongsTo $Tenants
 *
 * @method \App\Model\Entity\Security get($primaryKey, $options = [])
 * @method \App\Model\Entity\Security newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Security[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Security|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Security|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Security patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Security[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Security findOrCreate($search, callable $callback = null, $options = [])
 */
class SecuritiesTable extends Table
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

        $this->setTable('securities');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Tenants', [
            'foreignKey' => 'tenant_id',
            'joinType' => 'INNER'
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
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->numeric('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->scalar('method')
            ->maxLength('method', 10)
            ->requirePresence('method', 'create')
            ->notEmpty('method');

        $validator
            ->scalar('paid_back')
            ->requirePresence('paid_back', 'create')
            ->notEmpty('paid_back');

        $validator
            ->scalar('approved')
            ->requirePresence('approved', 'create')
            ->notEmpty('approved');

        $validator
            ->scalar('requested_by')
            ->maxLength('requested_by', 60)
            ->allowEmpty('requested_by');

        $validator
            ->scalar('approved_by')
            ->maxLength('approved_by', 60)
            ->allowEmpty('approved_by');

        $validator
            ->scalar('refunded')
            ->requirePresence('refunded', 'create')
            ->notEmpty('refunded');

        $validator
            ->integer('no')
            ->requirePresence('no', 'create')
            ->notEmpty('no');

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
        $rules->add($rules->existsIn(['tenant_id'], 'Tenants'));

        return $rules;
    }
}
