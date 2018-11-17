<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Deposits Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AccountsTable|\Cake\ORM\Association\BelongsTo $Accounts
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Deposit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Deposit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Deposit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Deposit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Deposit|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Deposit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Deposit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Deposit findOrCreate($search, callable $callback = null, $options = [])
 */
class DepositsTable extends Table
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

        $this->setTable('deposits');
        $this->setDisplayField('id');
        $this->setPrimaryKey(['id', 'client_id']);

        $this->belongsTo('Users', [
            'foreignKey' => 'prepared_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'approved_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'deposited_id'
        ]);
        $this->belongsTo('Accounts', [
            'foreignKey' => 'account_id'
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
            ->allowEmpty('total_amount');

        $validator
            ->numeric('rent_amount')
            ->requirePresence('rent_amount', 'create')
            ->notEmpty('rent_amount');

        $validator
            ->numeric('expense_amount')
            ->requirePresence('expense_amount', 'create')
            ->notEmpty('expense_amount');

        $validator
            ->scalar('method')
            ->maxLength('method', 10)
            ->allowEmpty('method');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->scalar('remarks')
            ->allowEmpty('remarks');

        $validator
            ->scalar('complete')
            ->requirePresence('complete', 'create')
            ->notEmpty('complete');

        $validator
            ->dateTime('created_at')
            ->allowEmpty('created_at');

        $validator
            ->scalar('account_no')
            ->maxLength('account_no', 45)
            ->allowEmpty('account_no');

        $validator
            ->scalar('account_name')
            ->maxLength('account_name', 45)
            ->allowEmpty('account_name');

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
        $rules->add($rules->existsIn(['prepared_id'], 'Users'));
        $rules->add($rules->existsIn(['approved_id'], 'Users'));
        $rules->add($rules->existsIn(['deposited_id'], 'Users'));
        $rules->add($rules->existsIn(['account_id'], 'Accounts'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
