<?php
namespace App\Test\TestCase\Controller;

use App\Controller\TenantsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\TenantsController Test Case
 */
class TenantsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tenants',
        'app.users',
        'app.confiscations',
        'app.damages',
        'app.evictions',
        'app.penalties',
        'app.refunds',
        'app.rents',
        'app.securities',
        'app.utilities',
        'app.units',
        'app.tenants_units'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
