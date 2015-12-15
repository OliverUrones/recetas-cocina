<?php
namespace App\Model\Table;

use App\Model\Entity\TiendaOferta;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TiendaOfertas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Tiendas
 * @property \Cake\ORM\Association\BelongsTo $Ingredientes
 */
class TiendaOfertasTable extends Table
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

        $this->table('tienda_ofertas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Tiendas', [
            'foreignKey' => 'tienda_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Ingredientes', [
            'foreignKey' => 'ingrediente_id',
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
            ->allowEmpty('descripcion');

        $validator
            ->allowEmpty('envase');

        $validator
            ->add('cantidad', 'valid', ['rule' => 'numeric'])
            ->requirePresence('cantidad', 'create')
            ->notEmpty('cantidad');

        $validator
            ->allowEmpty('medida');

        $validator
            ->allowEmpty('notas');

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
        $rules->add($rules->existsIn(['tienda_id'], 'Tiendas'));
        $rules->add($rules->existsIn(['ingrediente_id'], 'Ingredientes'));
        return $rules;
    }
}
