<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UnitsHasUsers Model
 *
 * @property \App\Model\Table\UnitsTable|\Cake\ORM\Association\BelongsTo $Units
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\UnitsHasUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\UnitsHasUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UnitsHasUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UnitsHasUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UnitsHasUser|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UnitsHasUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UnitsHasUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UnitsHasUser findOrCreate($search, callable $callback = null, $options = [])
 */
class UnitsHasUsersTable extends Table
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

        $this->setTable('units_has_users');
        $this->setDisplayField('units_id');
        $this->setPrimaryKey(['units_id', 'users_id']);

        $this->belongsTo('Units', [
            'foreignKey' => 'units_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['units_id'], 'Units'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }
}
