<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TiendasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TiendasTable Test Case
 */
class TiendasTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tiendas',
        'app.usuarios',
        'app.menus',
        'app.menu_platos',
        'app.recetas',
        'app.receta_categorias',
        'app.categorias',
        'app.receta_comentarios',
        'app.receta_ingredientes',
        'app.ingredientes',
        'app.tienda_ofertas',
        'app.receta_pasos',
        'app.receta_paso_imagenes',
        'app.planificaciones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tiendas') ? [] : ['className' => 'App\Model\Table\TiendasTable'];        $this->Tiendas = TableRegistry::get('Tiendas', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tiendas);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
