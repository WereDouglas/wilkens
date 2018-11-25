<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RentsFixture
 *
 */
class RentsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'method' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'no' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'total_cost' => ['type' => 'float', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'total_paid' => ['type' => 'float', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'for_client' => ['type' => 'float', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'percentage_used' => ['type' => 'float', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'for_commission' => ['type' => 'float', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'paid_to_client' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'start_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'end_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'unpaid_months' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'paid_months' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'vat' => ['type' => 'float', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'balance' => ['type' => 'float', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'branch_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'cheque_no' => ['type' => 'string', 'length' => 30, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'receive_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'editable' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created_at' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'landlord_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'deposit_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'occupant_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_rents_users1_idx' => ['type' => 'index', 'columns' => ['landlord_id'], 'length' => []],
            'fk_rents_deposits1_idx' => ['type' => 'index', 'columns' => ['deposit_id'], 'length' => []],
            'fk_rents_branch_id_idx' => ['type' => 'index', 'columns' => ['branch_id'], 'length' => []],
            'fk_tenants_id_idx' => ['type' => 'index', 'columns' => ['occupant_id'], 'length' => []],
            'fk_rents_employee_id_idx' => ['type' => 'index', 'columns' => ['receive_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_rents_branch_id' => ['type' => 'foreign', 'columns' => ['branch_id'], 'references' => ['branches', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_rents_clients1' => ['type' => 'foreign', 'columns' => ['landlord_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_rents_deposits1' => ['type' => 'foreign', 'columns' => ['deposit_id'], 'references' => ['deposits', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_rents_employee_id' => ['type' => 'foreign', 'columns' => ['receive_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_rents_tenants_id' => ['type' => 'foreign', 'columns' => ['occupant_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'id' => '1260886a-8f3b-4b78-90ad-dda821037202',
                'date' => '2018-11-22',
                'method' => 'Lorem ip',
                'no' => 'Lorem ipsum dolor sit amet',
                'total_cost' => 1,
                'total_paid' => 1,
                'for_client' => 1,
                'percentage_used' => 1,
                'for_commission' => 1,
                'paid_to_client' => 'Lorem ipsum dolor sit amet',
                'start_date' => '2018-11-22',
                'end_date' => '2018-11-22',
                'unpaid_months' => 1,
                'paid_months' => 1,
                'vat' => 1,
                'balance' => 1,
                'branch_id' => '2a44d07e-0f62-47d9-8094-c8d2d3b1a52a',
                'cheque_no' => 'Lorem ipsum dolor sit amet',
                'receive_id' => 'a0edee42-4307-4231-beef-7de8fb053b09',
                'editable' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1542894184,
                'landlord_id' => '1c7ec475-4c7d-4180-a3b8-7f7a639eff30',
                'deposit_id' => '3f03d373-097d-4da9-bce5-ceef4dce0b7d',
                'occupant_id' => '9d7456c0-6854-417c-b9e1-ec2c5e58cd18'
            ],
        ];
        parent::init();
    }
}
