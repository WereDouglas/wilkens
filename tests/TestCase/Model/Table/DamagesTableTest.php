<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DamagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DamagesTable Test Case
 */
class DamagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DamagesTable
     */
    public $Damages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.damages',
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
        $config = TableRegistry::getTableLocator()->exists('Damages') ? [] : ['className' => DamagesTable::class];
        $this->Damages = TableRegistry::getTableLocator()->get('Damages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Damages);

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
