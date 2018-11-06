<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Damages Model
 *
 * @property \App\Model\Table\TenantsTable|\Cake\ORM\Association\BelongsTo $Tenants
 *
 * @method \App\Model\Entity\Damage get($primaryKey, $options = [])
 * @method \App\Model\Entity\Damage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Damage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Damage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Damage|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Damage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Damage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Damage findOrCreate($search, callable $callback = null, $options = [])
 */
class DamagesTable extends Table
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

        $this->setTable('damages');
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
            ->scalar('details')
            ->maxLength('details', 100)
            ->allowEmpty('details');

        $validator
            ->numeric('amount')
            ->allowEmpty('amount');

        $validator
            ->date('date')
            ->allowEmpty('date');

        $validator
            ->scalar('prepared_by')
            ->maxLength('prepared_by', 1000)
            ->allowEmpty('prepared_by');

        $validator
            ->scalar('paid')
            ->requirePresence('paid', 'create')
            ->notEmpty('paid');

        $validator
            ->scalar('repaired')
            ->requirePresence('repaired', 'create')
            ->notEmpty('repaired');

        $validator
            ->date('date_repaired')
            ->allowEmpty('date_repaired');

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
        $rules->add($rules->existsIn(['tenant_id'], 'Tenants'));

        return $rules;
    }
}
