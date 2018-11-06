<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EvictionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EvictionsTable Test Case
 */
class EvictionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EvictionsTable
     */
    public $Evictions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.evictions',
        'app.tenants'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Evictions') ? [] : ['className' => EvictionsTable::class];
        $this->Evictions = TableRegistry::getTableLocator()->get('Evictions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Evictions);

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
