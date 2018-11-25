<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Securities Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Approveds
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Requesteds
 *
 * @method \App\Model\Entity\Security get($primaryKey, $options = [])
 * @method \App\Model\Entity\Security newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Security[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Security|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Security|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Security patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Security[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Security findOrCreate($search, callable $callback = null, $options = [])
 */
class SecuritiesTable extends Table
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

        $this->setTable('securities');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Requesteds', [
            'className'=>'Users',
            'propertyName'=>'requester',
            'foreignKey' => 'requested_id'
        ]);
        $this->belongsTo('Approveds', [
            'className'=>'Users',
            'propertyName'=>'approver',
            'foreignKey' => 'approved_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->numeric('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->scalar('method')
            ->maxLength('method', 10)
            ->requirePresence('method', 'create')
            ->notEmpty('method');

        $validator
            ->scalar('paid_back')
            ->requirePresence('paid_back', 'create')
            ->notEmpty('paid_back');

        $validator
            ->scalar('approved')
            ->requirePresence('approved', 'create')
            ->notEmpty('approved');

        $validator
            ->numeric('refunded')
            ->allowEmpty('refunded');

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
        $rules->add($rules->existsIn(['requested_id'], 'Requesteds'));
        $rules->add($rules->existsIn(['approved_id'], 'Approveds'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
