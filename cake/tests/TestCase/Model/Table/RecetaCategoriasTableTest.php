<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecetaCategoriasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecetaCategoriasTable Test Case
 */
class RecetaCategoriasTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.receta_categorias',
        'app.recetas',
        'app.categorias',
        'app.categoria_padres'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RecetaCategorias') ? [] : ['className' => 'App\Model\Table\RecetaCategoriasTable'];
        $this->RecetaCategorias = TableRegistry::get('RecetaCategorias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RecetaCategorias);

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
