<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TiendasFixture
 *
 */
class TiendasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 12, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'nombre' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'domicilio' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'poblacion' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'provincia' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'usuario_id' => ['type' => 'integer', 'length' => 12, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => 'Usuario que se corresponde con la tienda para poder conectar a la aplicación web.', 'precision' => null, 'autoIncrement' => null],
        'activa' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'Si la tienda esta activa para conectar como usuario, y si estará visible desde el portal junto con sus ofertas independientemente de que esté visible o no.', 'precision' => null],
        'visible' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'Si la tienda y sus ofertas estarán visibles en el portal aunque esté la tienda activa.', 'precision' => null],
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
            'nombre' => 'Lorem ipsum dolor sit amet',
            'domicilio' => 'Lorem ipsum dolor sit amet',
            'poblacion' => 'Lorem ipsum dolor sit amet',
            'provincia' => 'Lorem ipsum dolor sit amet',
            'usuario_id' => 1,
            'activa' => 1,
            'visible' => 1
        ],
    ];
}
