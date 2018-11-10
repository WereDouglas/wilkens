<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TenantsUnitsFixture
 *
 */
class TenantsUnitsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'unit_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'tenant_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_units_has_tenants_tenants1_idx' => ['type' => 'index', 'columns' => ['tenant_id'], 'length' => []],
            'fk_units_has_tenants_units1_idx' => ['type' => 'index', 'columns' => ['unit_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['unit_id', 'tenant_id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'unit_id' => '91af7578-c822-428d-8fe3-d890a2cc7e6a',
                'tenant_id' => 'e19c22db-8c0d-4bcb-8aad-1b6ac5f093b8'
            ],
        ];
        parent::init();
    }
}
