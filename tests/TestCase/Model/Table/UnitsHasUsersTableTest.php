<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UnitsHasUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UnitsHasUsersTable Test Case
 */
class UnitsHasUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UnitsHasUsersTable
     */
    public $UnitsHasUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.units_has_users',
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
        $config = TableRegistry::getTableLocator()->exists('UnitsHasUsers') ? [] : ['className' => UnitsHasUsersTable::class];
        $this->UnitsHasUsers = TableRegistry::getTableLocator()->get('UnitsHasUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UnitsHasUsers);

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
