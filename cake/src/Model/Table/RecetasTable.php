<?php
namespace App\Model\Table;

use App\Model\Entity\Receta;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Recetas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Usuarios
 * @property \Cake\ORM\Association\HasMany $MenuPlatos
 * @property \Cake\ORM\Association\HasMany $RecetaCategorias
 * @property \Cake\ORM\Association\HasMany $RecetaComentarios
 * @property \Cake\ORM\Association\HasMany $RecetaIngredientes
 * @property \Cake\ORM\Association\HasMany $RecetaPasos
 */
class RecetasTable extends Table
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

        $this->table('recetas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->hasMany('MenuPlatos', [
            'foreignKey' => 'receta_id'
        ]);
        $this->hasMany('RecetaCategorias', [
            'foreignKey' => 'receta_id'
        ]);
        $this->hasMany('RecetaComentarios', [
            'foreignKey' => 'receta_id'
        ]);
        $this->hasMany('RecetaIngredientes', [
            'foreignKey' => 'receta_id'
        ]);
        $this->hasMany('RecetaPasos', [
            'foreignKey' => 'receta_id'
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
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->allowEmpty('descripcion');

        $validator
            ->requirePresence('tipo_plato', 'create')
            ->notEmpty('tipo_plato');

        $validator
            ->add('dificultad', 'valid', ['rule' => 'boolean'])
            ->requirePresence('dificultad', 'create')
            ->notEmpty('dificultad');

        $validator
            ->add('comensales', 'valid', ['rule' => 'numeric'])
            ->requirePresence('comensales', 'create')
            ->notEmpty('comensales');

        $validator
            ->add('tiempo_elaboracion', 'valid', ['rule' => 'numeric'])
            ->requirePresence('tiempo_elaboracion', 'create')
            ->notEmpty('tiempo_elaboracion');

        $validator
            ->add('valoracion', 'valid', ['rule' => 'boolean'])
            ->requirePresence('valoracion', 'create')
            ->notEmpty('valoracion');

        $validator
            ->add('aceptada', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('aceptada');

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
        $rules->add($rules->existsIn(['usuario_id'], 'Usuarios'));
        return $rules;
    }
}
