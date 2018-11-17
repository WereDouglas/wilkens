<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RefundsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RefundsTable Test Case
 */
class RefundsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RefundsTable
     */
    public $Refunds;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.refunds',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Refunds') ? [] : ['className' => RefundsTable::class];
        $this->Refunds = TableRegistry::getTableLocator()->get('Refunds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Refunds);

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
