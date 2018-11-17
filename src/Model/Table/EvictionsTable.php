<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Evictions Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Eviction get($primaryKey, $options = [])
 * @method \App\Model\Entity\Eviction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Eviction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Eviction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Eviction|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Eviction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Eviction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Eviction findOrCreate($search, callable $callback = null, $options = [])
 */
class EvictionsTable extends Table
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

        $this->setTable('evictions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'evicted_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->numeric('balance')
            ->allowEmpty('balance');

        $validator
            ->date('date')
            ->allowEmpty('date');

        $validator
            ->numeric('costs_incurred')
            ->allowEmpty('costs_incurred');

        $validator
            ->numeric('repair_costs')
            ->allowEmpty('repair_costs');

        $validator
            ->numeric('bill_costs')
            ->allowEmpty('bill_costs');

        $validator
            ->numeric('disposal_costs')
            ->allowEmpty('disposal_costs');

        $validator
            ->scalar('evicted')
            ->requirePresence('evicted', 'create')
            ->notEmpty('evicted');

        $validator
            ->scalar('details')
            ->maxLength('details', 1000)
            ->allowEmpty('details');

        $validator
            ->date('evicted_on')
            ->allowEmpty('evicted_on');

        $validator
            ->scalar('reason')
            ->maxLength('reason', 100)
            ->allowEmpty('reason');

        $validator
            ->scalar('remarks')
            ->maxLength('remarks', 100)
            ->allowEmpty('remarks');

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
        $rules->add($rules->existsIn(['evicted_id'], 'Users'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
