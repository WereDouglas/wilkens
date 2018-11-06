<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KinsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KinsTable Test Case
 */
class KinsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\KinsTable
     */
    public $Kins;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.kins',
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
        $config = TableRegistry::getTableLocator()->exists('Kins') ? [] : ['className' => KinsTable::class];
        $this->Kins = TableRegistry::getTableLocator()->get('Kins', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Kins);

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
