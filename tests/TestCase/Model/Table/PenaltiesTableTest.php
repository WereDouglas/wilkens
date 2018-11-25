<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PenaltiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PenaltiesTable Test Case
 */
class PenaltiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PenaltiesTable
     */
    public $Penalties;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.penalties',
        'app.users',
        'app.rents'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Penalties') ? [] : ['className' => PenaltiesTable::class];
        $this->Penalties = TableRegistry::getTableLocator()->get('Penalties', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Penalties);

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
