<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MonthlyPayments Model
 *
 * @property \App\Model\Table\RentsTable|\Cake\ORM\Association\BelongsTo $Rents
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\MonthlyPayment get($primaryKey, $options = [])
 * @method \App\Model\Entity\MonthlyPayment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MonthlyPayment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MonthlyPayment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MonthlyPayment|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MonthlyPayment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MonthlyPayment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MonthlyPayment findOrCreate($search, callable $callback = null, $options = [])
 */
class MonthlyPaymentsTable extends Table
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

        $this->setTable('monthly_payments');
        $this->setDisplayField('id');
        $this->setPrimaryKey(['id', 'rent_id']);

        $this->belongsTo('Rents', [
            'foreignKey' => 'rent_id',
            'joinType' => 'INNER'
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
            ->numeric('total_amount')
            ->requirePresence('total_amount', 'create')
            ->notEmpty('total_amount');

        $validator
            ->numeric('to_client')
            ->requirePresence('to_client', 'create')
            ->notEmpty('to_client');

        $validator
            ->numeric('for_commission')
            ->requirePresence('for_commission', 'create')
            ->notEmpty('for_commission');

        $validator
            ->scalar('month')
            ->maxLength('month', 10)
            ->allowEmpty('month');

        $validator
            ->scalar('year')
            ->maxLength('year', 10)
            ->allowEmpty('year');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

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
        $rules->add($rules->existsIn(['rent_id'], 'Rents'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
