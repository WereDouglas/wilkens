<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MonthlyPaymentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MonthlyPaymentsTable Test Case
 */
class MonthlyPaymentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MonthlyPaymentsTable
     */
    public $MonthlyPayments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.monthly_payments',
        'app.rents'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MonthlyPayments') ? [] : ['className' => MonthlyPaymentsTable::class];
        $this->MonthlyPayments = TableRegistry::getTableLocator()->get('MonthlyPayments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MonthlyPayments);

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