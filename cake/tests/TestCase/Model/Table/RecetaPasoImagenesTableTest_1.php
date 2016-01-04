<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecetaPasoImagenesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecetaPasoImagenesTable Test Case
 */
class RecetaPasoImagenesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.receta_paso_imagenes',
        'app.receta_pasos',
        'app.recetas',
        'app.usuarios',
        'app.menus',
        'app.menu_platos',
        'app.planificaciones',
        'app.receta_comentarios',
        'app.tiendas',
        'app.tienda_ofertas',
        'app.ingredientes',
        'app.receta_categorias',
        'app.categorias',
        'app.categoria_padres',
        'app.receta_ingredientes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RecetaPasoImagenes') ? [] : ['className' => 'App\Model\Table\RecetaPasoImagenesTable'];
        $this->RecetaPasoImagenes = TableRegistry::get('RecetaPasoImagenes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RecetaPasoImagenes);

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
