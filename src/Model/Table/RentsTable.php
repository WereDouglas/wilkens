<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rents Model
 *
 * @property \App\Model\Table\BranchesTable|\Cake\ORM\Association\BelongsTo $Branches
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Landlords
 * @property \App\Model\Table\DepositsTable|\Cake\ORM\Association\BelongsTo $Deposits
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Occupants
 * @property \App\Model\Table\MonthlyPaymentsTable|\Cake\ORM\Association\HasMany $MonthlyPayments
 * @property \App\Model\Table\PenaltiesTable|\Cake\ORM\Association\HasMany $Penalties
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

        $this->belongsTo('Branches', [
            'foreignKey' => 'branch_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'receive_id'
        ]);
        $this->belongsTo('Landlords', [
            'className'=>'Users',
            'foreignKey' => 'landlord_id',
            'propertyName'=>'landlord',
            'joinType' => 'INNER'

        ]);
        $this->belongsTo('Deposits', [
            'foreignKey' => 'deposit_id'
        ]);
        $this->belongsTo('Occupants', [
            'className'=>'Users',
            'foreignKey' => 'occupant_id',
            'propertyName'=>'occupant',
            'joinType' => 'INNER'

        ]);
        $this->hasMany('MonthlyPayments', [
            'foreignKey' => 'rent_id'
        ]);
        $this->hasMany('Penalties', [
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
            ->maxLength('method', 50)
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
            ->allowEmpty('unpaid_months');

        $validator
            ->integer('paid_months')
            ->allowEmpty('paid_months');

        $validator
            ->numeric('vat')
            ->allowEmpty('vat');

        $validator
            ->numeric('balance')
            ->allowEmpty('balance');

        $validator
            ->scalar('cheque_no')
            ->maxLength('cheque_no', 30)
            ->allowEmpty('cheque_no');

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
        $rules->add($rules->existsIn(['branch_id'], 'Branches'));
        $rules->add($rules->existsIn(['receive_id'], 'Users'));
        $rules->add($rules->existsIn(['landlord_id'], 'Landlords'));
        $rules->add($rules->existsIn(['deposit_id'], 'Deposits'));
        $rules->add($rules->existsIn(['occupant_id'], 'Occupants'));

        return $rules;
    }
}
