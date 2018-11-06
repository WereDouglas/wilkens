<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConfiscationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConfiscationsTable Test Case
 */
class ConfiscationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConfiscationsTable
     */
    public $Confiscations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.confiscations',
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
        $config = TableRegistry::getTableLocator()->exists('Confiscations') ? [] : ['className' => ConfiscationsTable::class];
        $this->Confiscations = TableRegistry::getTableLocator()->get('Confiscations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Confiscations);

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
