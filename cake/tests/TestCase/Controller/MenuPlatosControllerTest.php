<?php
namespace App\Test\TestCase\Controller;

use App\Controller\MenuPlatosController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\MenuPlatosController Test Case
 */
class MenuPlatosControllerTest extends IntegrationTestCase
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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
