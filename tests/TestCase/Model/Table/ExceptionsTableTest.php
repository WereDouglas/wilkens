<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExceptionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExceptionsTable Test Case
 */
class ExceptionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExceptionsTable
     */
    public $Exceptions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.exceptions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Exceptions') ? [] : ['className' => ExceptionsTable::class];
        $this->Exceptions = TableRegistry::getTableLocator()->get('Exceptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Exceptions);

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
}
