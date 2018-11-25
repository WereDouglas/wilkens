<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Penalties Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\RentsTable|\Cake\ORM\Association\BelongsTo $Rents
 *
 * @method \App\Model\Entity\Penalty get($primaryKey, $options = [])
 * @method \App\Model\Entity\Penalty newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Penalty[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Penalty|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Penalty|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Penalty patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Penalty[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Penalty findOrCreate($search, callable $callback = null, $options = [])
 */
class PenaltiesTable extends Table
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

        $this->setTable('penalties');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Rents', [
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
            ->numeric('total')
            ->allowEmpty('total');

        $validator
            ->dateTime('created_at')
            ->allowEmpty('created_at');

        $validator
            ->scalar('paid')
            ->maxLength('paid', 10)
            ->allowEmpty('paid');

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
        $rules->add($rules->existsIn(['rent_id'], 'Rents'));

        return $rules;
    }
}
