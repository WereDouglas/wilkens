<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UnitsHasUsersFixture
 *
 */
class UnitsHasUsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'units_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'users_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_units_has_users_users1_idx' => ['type' => 'index', 'columns' => ['users_id'], 'length' => []],
            'fk_units_has_users_units1_idx' => ['type' => 'index', 'columns' => ['units_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['units_id', 'users_id'], 'length' => []],
            'fk_units_has_users_units1' => ['type' => 'foreign', 'columns' => ['units_id'], 'references' => ['units', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_units_has_users_users1' => ['type' => 'foreign', 'columns' => ['users_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'units_id' => '3de2f0fa-edf3-4b25-ae62-7ae549110cfe',
                'users_id' => 'e39656a7-b3a5-4895-a316-85d992710add'
            ],
        ];
        parent::init();
    }
}
