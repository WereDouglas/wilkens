<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Exceptions Model
 *
 * @method \App\Model\Entity\Exception get($primaryKey, $options = [])
 * @method \App\Model\Entity\Exception newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Exception[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Exception|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Exception|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Exception patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Exception[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Exception findOrCreate($search, callable $callback = null, $options = [])
 */
class ExceptionsTable extends Table
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

        $this->setTable('exceptions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('message')
            ->maxLength('message', 100)
            ->allowEmpty('message');

        $validator
            ->scalar('process')
            ->maxLength('process', 100)
            ->allowEmpty('process');

        $validator
            ->dateTime('created_at')
            ->allowEmpty('created_at');

        return $validator;
    }
}
