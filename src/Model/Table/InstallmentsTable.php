<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Installments Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Receivers
 *
 * @method \App\Model\Entity\Installment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Installment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Installment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Installment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Installment|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Installment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Installment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Installment findOrCreate($search, callable $callback = null, $options = [])
 */
class InstallmentsTable extends Table
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

        $this->setTable('installments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Receivers', [
            'className'=>'Users',
            'propertyName'=>'receiver',
            'foreignKey' => 'received_id'
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
            ->numeric('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->scalar('paid')
            ->allowEmpty('paid');

        $validator
            ->integer('no')
            ->allowEmpty('no');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->scalar('method')
            ->maxLength('method', 45)
            ->requirePresence('method', 'create')
            ->notEmpty('method');

        $validator
            ->date('deadline')
            ->allowEmpty('deadline');

        $validator
            ->numeric('balance')
            ->allowEmpty('balance');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['received_id'], 'Receivers'));
        return $rules;
    }
}
