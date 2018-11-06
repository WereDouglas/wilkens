<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Utilities Model
 *
 * @property \App\Model\Table\TenantsTable|\Cake\ORM\Association\BelongsTo $Tenants
 *
 * @method \App\Model\Entity\Utility get($primaryKey, $options = [])
 * @method \App\Model\Entity\Utility newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Utility[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Utility|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Utility|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Utility patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Utility[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Utility findOrCreate($search, callable $callback = null, $options = [])
 */
class UtilitiesTable extends Table
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

        $this->setTable('utilities');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['id', 'tenant_id']);

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
            ->scalar('name')
            ->maxLength('name', 60)
            ->allowEmpty('name');

        $validator
            ->scalar('starting_reading')
            ->maxLength('starting_reading', 60)
            ->allowEmpty('starting_reading');

        $validator
            ->numeric('unit_cost')
            ->allowEmpty('unit_cost');

        $validator
            ->scalar('account_no')
            ->maxLength('account_no', 60)
            ->allowEmpty('account_no');

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
