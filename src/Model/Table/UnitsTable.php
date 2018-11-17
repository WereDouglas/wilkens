<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Units Model
 *
 * @property \App\Model\Table\PropertiesTable|\Cake\ORM\Association\BelongsTo $Properties
 * @property |\Cake\ORM\Association\BelongsTo $Users
 * @property |\Cake\ORM\Association\HasMany $Rents
 * @property |\Cake\ORM\Association\HasMany $Requisitions
 * @property \App\Model\Table\TenantsTable|\Cake\ORM\Association\HasMany $Tenants
 * @property \App\Model\Table\TenantsTable|\Cake\ORM\Association\BelongsToMany $Tenants
 *
 * @method \App\Model\Entity\Unit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Unit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Unit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Unit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Unit|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Unit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Unit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Unit findOrCreate($search, callable $callback = null, $options = [])
 */
class UnitsTable extends Table
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

        $this->setTable('units');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Properties', [
            'foreignKey' => 'property_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Rents', [
            'foreignKey' => 'unit_id'
        ]);
        $this->hasMany('Requisitions', [
            'foreignKey' => 'unit_id'
        ]);
        $this->hasMany('Tenants', [
            'foreignKey' => 'unit_id'
        ]);
        $this->belongsToMany('Tenants', [
            'foreignKey' => 'unit_id',
            'targetForeignKey' => 'tenant_id',
            'joinTable' => 'tenants_units'
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
            ->scalar('types')
            ->maxLength('types', 10)
            ->allowEmpty('types');

        $validator
            ->scalar('name')
            ->maxLength('name', 60)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('states')
            ->maxLength('states', 60)
            ->allowEmpty('states');

        $validator
            ->scalar('occupied')
            ->requirePresence('occupied', 'create')
            ->notEmpty('occupied');

        $validator
            ->numeric('cost')
            ->allowEmpty('cost');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->integer('rooms')
            ->allowEmpty('rooms');

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
        $rules->add($rules->existsIn(['property_id'], 'Properties'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
