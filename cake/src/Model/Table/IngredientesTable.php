<?php
namespace App\Model\Table;

use App\Model\Entity\Ingrediente;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ingredientes Model
 *
 * @property \Cake\ORM\Association\HasMany $TiendaOfertas
 */
class IngredientesTable extends Table
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

        $this->table('ingredientes');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('TiendaOfertas', [
            'foreignKey' => 'ingrediente_id'
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
            ->allowEmpty('nombre');

        $validator
            ->allowEmpty('descripcion');

        $validator
            ->allowEmpty('datos_nutricion');

        return $validator;
    }
}
