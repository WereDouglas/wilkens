<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TenantsUnitsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TenantsUnitsTable Test Case
 */
class TenantsUnitsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TenantsUnitsTable
     */
    public $TenantsUnits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tenants_units',
        'app.units',
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
        $config = TableRegistry::getTableLocator()->exists('TenantsUnits') ? [] : ['className' => TenantsUnitsTable::class];
        $this->TenantsUnits = TableRegistry::getTableLocator()->get('TenantsUnits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TenantsUnits);

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
