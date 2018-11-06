<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rents Model
 *
 * @property \App\Model\Table\BankingDepositsTable|\Cake\ORM\Association\BelongsTo $BankingDeposits
 * @property \App\Model\Table\BranchesTable|\Cake\ORM\Association\BelongsTo $Branches
 * @property \App\Model\Table\TenantsTable|\Cake\ORM\Association\BelongsTo $Tenants
 * @property \App\Model\Table\MonthlyPaymentsTable|\Cake\ORM\Association\HasMany $MonthlyPayments
 *
 * @method \App\Model\Entity\Rent get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Rent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rent|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rent findOrCreate($search, callable $callback = null, $options = [])
 */
class RentsTable extends Table
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

        $this->setTable('rents');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('BankingDeposits', [
            'foreignKey' => 'banking_deposit_id'
        ]);
        $this->belongsTo('Branches', [
            'foreignKey' => 'branch_id'
        ]);
        $this->belongsTo('Tenants', [
            'foreignKey' => 'tenant_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('MonthlyPayments', [
            'foreignKey' => 'rent_id'
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
            ->scalar('method')
            ->maxLength('method', 10)
            ->requirePresence('method', 'create')
            ->notEmpty('method');

        $validator
            ->scalar('no')
            ->maxLength('no', 255)
            ->requirePresence('no', 'create')
            ->notEmpty('no');

        $validator
            ->numeric('total_cost')
            ->requirePresence('total_cost', 'create')
            ->notEmpty('total_cost');

        $validator
            ->numeric('total_paid')
            ->requirePresence('total_paid', 'create')
            ->notEmpty('total_paid');

        $validator
            ->numeric('for_client')
            ->requirePresence('for_client', 'create')
            ->notEmpty('for_client');

        $validator
            ->numeric('percentage_used')
            ->requirePresence('percentage_used', 'create')
            ->notEmpty('percentage_used');

        $validator
            ->numeric('for_commission')
            ->requirePresence('for_commission', 'create')
            ->notEmpty('for_commission');

        $validator
            ->scalar('paid_by')
            ->maxLength('paid_by', 50)
            ->allowEmpty('paid_by');

        $validator
            ->scalar('paid_to_client')
            ->requirePresence('paid_to_client', 'create')
            ->notEmpty('paid_to_client');

        $validator
            ->date('start_date')
            ->requirePresence('start_date', 'create')
            ->notEmpty('start_date');

        $validator
            ->date('end_date')
            ->requirePresence('end_date', 'create')
            ->notEmpty('end_date');

        $validator
            ->integer('unpaid_months')
            ->requirePresence('unpaid_months', 'create')
            ->notEmpty('unpaid_months');

        $validator
            ->integer('paid_months')
            ->allowEmpty('paid_months');

        $validator
            ->numeric('vat')
            ->requirePresence('vat', 'create')
            ->notEmpty('vat');

        $validator
            ->numeric('balance')
            ->requirePresence('balance', 'create')
            ->notEmpty('balance');

        $validator
            ->scalar('cheque_no')
            ->maxLength('cheque_no', 30)
            ->allowEmpty('cheque_no');

        $validator
            ->scalar('recieved_by')
            ->maxLength('recieved_by', 36)
            ->allowEmpty('recieved_by');

        $validator
            ->scalar('editable')
            ->requirePresence('editable', 'create')
            ->notEmpty('editable');

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
        $rules->add($rules->existsIn(['banking_deposit_id'], 'BankingDeposits'));
        $rules->add($rules->existsIn(['branch_id'], 'Branches'));
        $rules->add($rules->existsIn(['tenant_id'], 'Tenants'));

        return $rules;
    }
}
