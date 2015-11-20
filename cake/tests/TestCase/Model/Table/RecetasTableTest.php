<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecetasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecetasTable Test Case
 */
class RecetasTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.recetas',
        'app.usuarios',
        'app.menu_platos',
        'app.menus',
        'app.receta_categorias',
        'app.categorias',
        'app.categoria_padres',
        'app.receta_comentarios',
        'app.receta_ingredientes',
        'app.ingredientes',
        'app.tienda_ofertas',
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
        $config = TableRegistry::exists('Recetas') ? [] : ['className' => 'App\Model\Table\RecetasTable'];
        $this->Recetas = TableRegistry::get('Recetas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Recetas);

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
