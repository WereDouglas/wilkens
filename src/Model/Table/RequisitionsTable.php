<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requisitions Model
 *
 * @property \App\Model\Table\RequestedBiesTable|\Cake\ORM\Association\BelongsTo $RequestedBies
 * @property \App\Model\Table\ManagersTable|\Cake\ORM\Association\BelongsTo $Managers
 * @property \App\Model\Table\ClientsTable|\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\CompaniesTable|\Cake\ORM\Association\BelongsTo $Companies
 * @property \App\Model\Table\PropertiesTable|\Cake\ORM\Association\BelongsTo $Properties
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
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('RequestedBies', [
            'foreignKey' => 'requested_by_id'
        ]);
        $this->belongsTo('Managers', [
            'foreignKey' => 'manager_id'
        ]);
        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id'
        ]);
        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id'
        ]);
        $this->belongsTo('Properties', [
            'foreignKey' => 'property_id'
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
            ->allowEmpty('id', 'create');

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
            ->scalar('no')
            ->maxLength('no', 20)
            ->allowEmpty('no');

        $validator
            ->scalar('remarks')
            ->allowEmpty('remarks');

        $validator
            ->scalar('approved')
            ->requirePresence('approved', 'create')
            ->notEmpty('approved');

        $validator
            ->scalar('approved_by')
            ->maxLength('approved_by', 36)
            ->allowEmpty('approved_by');

        $validator
            ->scalar('paid')
            ->requirePresence('paid', 'create')
            ->notEmpty('paid');

        $validator
            ->scalar('paid_by')
            ->maxLength('paid_by', 36)
            ->allowEmpty('paid_by');

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
            ->maxLength('category', 10)
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
        $rules->add($rules->existsIn(['requested_by_id'], 'RequestedBies'));
        $rules->add($rules->existsIn(['manager_id'], 'Managers'));
        $rules->add($rules->existsIn(['client_id'], 'Clients'));
        $rules->add($rules->existsIn(['company_id'], 'Companies'));
        $rules->add($rules->existsIn(['property_id'], 'Properties'));

        return $rules;
    }
}
