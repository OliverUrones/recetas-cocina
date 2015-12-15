<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IngredientesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IngredientesTable Test Case
 */
class IngredientesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ingredientes',
        'app.tienda_ofertas',
        'app.tiendas',
        'app.usuarios',
        'app.menus',
        'app.menu_platos',
        'app.recetas',
        'app.receta_categorias',
        'app.categorias',
        'app.categoria_padres',
        'app.receta_comentarios',
        'app.receta_ingredientes',
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
        $config = TableRegistry::exists('Ingredientes') ? [] : ['className' => 'App\Model\Table\IngredientesTable'];
        $this->Ingredientes = TableRegistry::get('Ingredientes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ingredientes);

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
}
