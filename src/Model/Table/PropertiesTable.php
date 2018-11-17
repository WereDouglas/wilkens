<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Properties Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property |\Cake\ORM\Association\HasMany $Requisitions
 * @property |\Cake\ORM\Association\HasMany $Tenants
 * @property \App\Model\Table\UnitsTable|\Cake\ORM\Association\HasMany $Units
 *
 * @method \App\Model\Entity\Property get($primaryKey, $options = [])
 * @method \App\Model\Entity\Property newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Property[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Property|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Property|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Property patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Property[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Property findOrCreate($search, callable $callback = null, $options = [])
 */
class PropertiesTable extends Table
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

        $this->setTable('properties');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'manager_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'legal_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Requisitions', [
            'foreignKey' => 'property_id'
        ]);
        $this->hasMany('Tenants', [
            'foreignKey' => 'property_id'
        ]);
        $this->hasMany('Units', [
            'foreignKey' => 'property_id'
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
            ->scalar('name')
            ->maxLength('name', 10)
            ->allowEmpty('name');

        $validator
            ->scalar('details')
            ->allowEmpty('details');

        $validator
            ->integer('no_of_rooms')
            ->requirePresence('no_of_rooms', 'create')
            ->notEmpty('no_of_rooms');

        $validator
            ->scalar('terms')
            ->maxLength('terms', 100)
            ->allowEmpty('terms');

        $validator
            ->scalar('location')
            ->maxLength('location', 100)
            ->allowEmpty('location');

        $validator
            ->scalar('category')
            ->maxLength('category', 20)
            ->allowEmpty('category');

        $validator
            ->numeric('lng')
            ->allowEmpty('lng');

        $validator
            ->numeric('lat')
            ->allowEmpty('lat');

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
        $rules->add($rules->existsIn(['manager_id'], 'Users'));
        $rules->add($rules->existsIn(['legal_id'], 'Users'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
