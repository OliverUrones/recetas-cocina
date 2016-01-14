<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MenuPlatosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MenuPlatosTable Test Case
 */
class MenuPlatosTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.menu_platos',
        'app.menus',
        'app.usuarios',
        'app.planificaciones',
        'app.receta_comentarios',
        'app.recetas',
        'app.receta_categorias',
        'app.categorias',
        'app.categoria_padres',
        'app.receta_ingredientes',
        'app.ingredientes',
        'app.tienda_ofertas',
        'app.tiendas',
        'app.receta_pasos',
        'app.receta_paso_imagenes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MenuPlatos') ? [] : ['className' => 'App\Model\Table\MenuPlatosTable'];
        $this->MenuPlatos = TableRegistry::get('MenuPlatos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MenuPlatos);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
