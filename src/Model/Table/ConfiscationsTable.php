<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Confiscations Model
 *
 * @property \App\Model\Table\TenantsTable|\Cake\ORM\Association\BelongsTo $Tenants
 *
 * @method \App\Model\Entity\Confiscation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Confiscation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Confiscation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Confiscation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Confiscation|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Confiscation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Confiscation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Confiscation findOrCreate($search, callable $callback = null, $options = [])
 */
class ConfiscationsTable extends Table
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

        $this->setTable('confiscations');
        $this->setDisplayField('id');
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
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->scalar('details')
            ->maxLength('details', 100)
            ->allowEmpty('details');

        $validator
            ->numeric('cost')
            ->requirePresence('cost', 'create')
            ->notEmpty('cost');

        $validator
            ->scalar('sold')
            ->requirePresence('sold', 'create')
            ->notEmpty('sold');

        $validator
            ->date('sold_on')
            ->allowEmpty('sold_on');

        $validator
            ->scalar('sold_by')
            ->maxLength('sold_by', 20)
            ->allowEmpty('sold_by');

        $validator
            ->numeric('storage_fees')
            ->requirePresence('storage_fees', 'create')
            ->notEmpty('storage_fees');

        $validator
            ->date('deadline')
            ->allowEmpty('deadline');

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
