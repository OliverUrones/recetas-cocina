<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RecetasFixture
 *
 */
class RecetasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 12, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'nombre' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'descripcion' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'tipo_plato' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => false, 'default' => null, 'comment' => 'Tipo Plato E=Entrantes, 1=Primeros, 2=Segundos, P=Postres, ...', 'precision' => null],
        'dificultad' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '1=Muy Facil,5=Muy Dificil.', 'precision' => null],
        'comensales' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '4', 'comment' => 'Numero de comensales para la receta.', 'precision' => null],
        'tiempo_elaboracion' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => 'Tiempo en Minutos de elaboracion de la receta.', 'precision' => null, 'autoIncrement' => null],
        'valoracion' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '3', 'comment' => 'Valoracion de la receta: 1=Peor, 3=Buena, 5=Mejor.', 'precision' => null],
        'usuario_id' => ['type' => 'integer', 'length' => 12, 'unsigned' => true, 'null' => true, 'default' => '0', 'comment' => 'Usuario que ha creado la receta o CERO si no existe (como si fuera NULL).', 'precision' => null, 'autoIncrement' => null],
        'aceptada' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'Indicador de receta aceptada o no.', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'nombre' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'descripcion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'tipo_plato' => 'Lorem ipsum dolor sit ame',
            'dificultad' => 1,
            'comensales' => 1,
            'tiempo_elaboracion' => 1,
            'valoracion' => 1,
            'usuario_id' => 1,
            'aceptada' => 1
        ],
    ];
}
