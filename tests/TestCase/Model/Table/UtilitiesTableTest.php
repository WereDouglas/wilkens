<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UtilitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UtilitiesTable Test Case
 */
class UtilitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UtilitiesTable
     */
    public $Utilities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.utilities',
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
        $config = TableRegistry::getTableLocator()->exists('Utilities') ? [] : ['className' => UtilitiesTable::class];
        $this->Utilities = TableRegistry::getTableLocator()->get('Utilities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Utilities);

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
