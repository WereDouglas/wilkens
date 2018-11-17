<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bills Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Createds
 * @property \App\Model\Table\UtilitiesTable|\Cake\ORM\Association\BelongsTo $Utilities
 * @property |\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\PaymentsTable|\Cake\ORM\Association\HasMany $Payments
 *
 * @method \App\Model\Entity\Bill get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bill newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bill[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bill|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bill|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bill patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bill[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bill findOrCreate($search, callable $callback = null, $options = [])
 */
class BillsTable extends Table
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

        $this->setTable('bills');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Createds', [
            'foreignKey' => 'created_id'
        ]);
        $this->belongsTo('Utilities', [
            'foreignKey' => 'utility_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'bill_id'
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
            ->date('created_on')
            ->requirePresence('created_on', 'create')
            ->notEmpty('created_on');

        $validator
            ->date('due_date')
            ->allowEmpty('due_date');

        $validator
            ->scalar('previous_reading')
            ->maxLength('previous_reading', 60)
            ->allowEmpty('previous_reading');

        $validator
            ->scalar('current_reading')
            ->maxLength('current_reading', 60)
            ->requirePresence('current_reading', 'create')
            ->notEmpty('current_reading');

        $validator
            ->scalar('units_used')
            ->maxLength('units_used', 60)
            ->allowEmpty('units_used');

        $validator
            ->numeric('unit_cost')
            ->allowEmpty('unit_cost');

        $validator
            ->numeric('total_cost')
            ->allowEmpty('total_cost');

        $validator
            ->scalar('paid')
            ->requirePresence('paid', 'create')
            ->notEmpty('paid');

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
        $rules->add($rules->existsIn(['created_id'], 'Createds'));
        $rules->add($rules->existsIn(['utility_id'], 'Utilities'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
