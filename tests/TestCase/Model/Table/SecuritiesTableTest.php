<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SecuritiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SecuritiesTable Test Case
 */
class SecuritiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SecuritiesTable
     */
    public $Securities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.securities',
        'app.users',
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
        $config = TableRegistry::getTableLocator()->exists('Securities') ? [] : ['className' => SecuritiesTable::class];
        $this->Securities = TableRegistry::getTableLocator()->get('Securities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Securities);

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
