<?php
namespace App\Model\Table;

use App\Model\Entity\PlanificacionMenu;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PlanificacionMenus Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Planificacions
 * @property \Cake\ORM\Association\BelongsTo $Menus
 */
class PlanificacionMenusTable extends Table
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

        $this->table('planificacion_menus');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Planificacions', [
            'foreignKey' => 'planificacion_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Menus', [
            'foreignKey' => 'menu_id',
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
            ->add('numero_dia', 'valid', ['rule' => 'numeric'])
            ->requirePresence('numero_dia', 'create')
            ->notEmpty('numero_dia');

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
        $rules->add($rules->existsIn(['planificacion_id'], 'Planificacions'));
        $rules->add($rules->existsIn(['menu_id'], 'Menus'));
        return $rules;
    }
}
