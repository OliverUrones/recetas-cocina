<?php
namespace App\Model\Table;

use App\Model\Entity\RecetaComentario;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RecetaComentarios Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Recetas
 * @property \Cake\ORM\Association\BelongsTo $Usuarios
 */
class RecetaComentariosTable extends Table
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

        $this->table('receta_comentarios');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Recetas', [
            'foreignKey' => 'receta_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id',
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
            ->add('fechahora', 'valid', ['rule' => 'datetime'])
            ->requirePresence('fechahora', 'create')
            ->notEmpty('fechahora');

        $validator
            ->requirePresence('texto', 'create')
            ->notEmpty('texto');

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
        $rules->add($rules->existsIn(['receta_id'], 'Recetas'));
        $rules->add($rules->existsIn(['usuario_id'], 'Usuarios'));
        return $rules;
    }
}
