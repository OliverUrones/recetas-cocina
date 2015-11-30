<?php
namespace App\Model\Table;

use App\Model\Entity\RecetaPasoImagen;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RecetaPasoImagenes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RecetaPasos
 */
class RecetaPasoImagenesTable extends Table
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

        $this->table('receta_paso_imagenes');
        $this->displayField('id');
        $this->primaryKey('id');
        //Establecer la entidad que usa esta tabla porque no esta bien generado su nombre al singular.
        $this->entityClass('App\Model\Entity\RecetaPasoImagen');

        $this->belongsTo('RecetaPasos', [
            'foreignKey' => 'receta_paso_id',
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
            ->add('orden', 'valid', ['rule' => 'numeric'])
            ->requirePresence('orden', 'create')
            ->notEmpty('orden');

        $validator
            ->requirePresence('imagen', 'create')
            ->notEmpty('imagen');

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
        $rules->add($rules->existsIn(['receta_paso_id'], 'RecetaPasos'));
        return $rules;
    }
}
