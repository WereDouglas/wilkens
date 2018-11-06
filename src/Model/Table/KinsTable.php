<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Kins Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Kin get($primaryKey, $options = [])
 * @method \App\Model\Entity\Kin newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Kin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Kin|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Kin|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Kin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Kin[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Kin findOrCreate($search, callable $callback = null, $options = [])
 */
class KinsTable extends Table
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

        $this->setTable('kins');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['id', 'user_id']);

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
            ->scalar('name')
            ->maxLength('name', 65)
            ->allowEmpty('name');

        $validator
            ->scalar('contact')
            ->maxLength('contact', 15)
            ->allowEmpty('contact');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 65)
            ->allowEmpty('photo');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
