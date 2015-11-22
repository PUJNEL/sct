<?php
namespace App\Model\Table;

use App\Model\Entity\Step;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Steps Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Turns
 * @property \Cake\ORM\Association\BelongsTo $Steptypes
 */
class StepsTable extends Table
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

        $this->table('steps');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Turns', [
            'foreignKey' => 'turn_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Steptypes', [
            'foreignKey' => 'steptype_id',
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('startdatetime', 'valid', ['rule' => 'datetime'])
            ->requirePresence('startdatetime', 'create')
            ->notEmpty('startdatetime');

        $validator
            ->add('enddatetime', 'valid', ['rule' => 'datetime'])
            ->requirePresence('enddatetime', 'create')
            ->notEmpty('enddatetime');

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
        $rules->add($rules->existsIn(['turn_id'], 'Turns'));
        $rules->add($rules->existsIn(['steptype_id'], 'Steptypes'));
        return $rules;
    }
}
