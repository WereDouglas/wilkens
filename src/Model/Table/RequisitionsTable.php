<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requisitions Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Approveds
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Paids
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Requesteds
 * @property \App\Model\Table\PropertiesTable|\Cake\ORM\Association\BelongsTo $Properties
 * @property \App\Model\Table\UnitsTable|\Cake\ORM\Association\BelongsTo $Units
 * @property \App\Model\Table\ExpensesTable|\Cake\ORM\Association\HasMany $Expenses
 *
 * @method \App\Model\Entity\Requisition get($primaryKey, $options = [])
 * @method \App\Model\Entity\Requisition newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Requisition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Requisition|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Requisition|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Requisition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Requisition[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Requisition findOrCreate($search, callable $callback = null, $options = [])
 */
class RequisitionsTable extends Table
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

        $this->setTable('requisitions');
        $this->setDisplayField('no');
        $this->setPrimaryKey('id');

        $this->belongsTo('Approveds', [
            'className'=>'Users',
            'propertyName'=>'approver',
            'foreignKey' => 'approved_id'
        ]);
        $this->belongsTo('Paids', [
            'className'=>'Users',
            'propertyName'=>'paider',
            'foreignKey' => 'paid_id'
        ]);
        $this->belongsTo('Requesteds', [
            'className'=>'Users',
            'propertyName'=>'requested',
            'foreignKey' => 'requested_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Properties', [
            'foreignKey' => 'property_id'
        ]);
        $this->belongsTo('Units', [
            'foreignKey' => 'unit_id'
        ]);
        $this->hasMany('Expenses', [
            'foreignKey' => 'requisition_id'
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
            ->requirePresence('id', 'create')
            ->notEmpty('id');

        $validator
            ->scalar('type')
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->scalar('details')
            ->requirePresence('details', 'create')
            ->notEmpty('details');

        $validator
            ->integer('no')
            ->allowEmpty('no', 'create');

        $validator
            ->scalar('remarks')
            ->allowEmpty('remarks');

        $validator
            ->scalar('approved')
            ->requirePresence('approved', 'create')
            ->notEmpty('approved');

        $validator
            ->scalar('paid')
            ->requirePresence('paid', 'create')
            ->notEmpty('paid');

        $validator
            ->scalar('method')
            ->maxLength('method', 10)
            ->allowEmpty('method');

        $validator
            ->scalar('repaired')
            ->requirePresence('repaired', 'create')
            ->notEmpty('repaired');

        $validator
            ->scalar('category')
            ->maxLength('category', 50)
            ->allowEmpty('category');

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
        $rules->add($rules->existsIn(['approved_id'], 'Approveds'));
        $rules->add($rules->existsIn(['paid_id'], 'Paids'));
        $rules->add($rules->existsIn(['requested_id'], 'Requesteds'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['property_id'], 'Properties'));
        $rules->add($rules->existsIn(['unit_id'], 'Units'));

        return $rules;
    }
}
