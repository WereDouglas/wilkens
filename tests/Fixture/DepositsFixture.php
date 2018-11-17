<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DepositsFixture
 *
 */
class DepositsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'total_amount' => ['type' => 'float', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'rent_amount' => ['type' => 'float', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'expense_amount' => ['type' => 'float', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'method' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'prepared_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'approved_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'deposited_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'remarks' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'complete' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created_at' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'account_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'user_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'account_no' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'account_name' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_deposits_accounts1_idx' => ['type' => 'index', 'columns' => ['account_id'], 'length' => []],
            'fk_deposits_users1_idx' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
            'fk_prepared_users_idx' => ['type' => 'index', 'columns' => ['prepared_id'], 'length' => []],
            'fk_approved_users_idx' => ['type' => 'index', 'columns' => ['approved_id'], 'length' => []],
            'fk_deposited_users_idx' => ['type' => 'index', 'columns' => ['deposited_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'deposits_accounts_id_FK' => ['type' => 'foreign', 'columns' => ['account_id'], 'references' => ['accounts', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_approved_users' => ['type' => 'foreign', 'columns' => ['approved_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_deposited_users' => ['type' => 'foreign', 'columns' => ['deposited_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_deposits_users1' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_prepared_users' => ['type' => 'foreign', 'columns' => ['prepared_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'id' => '3eea288f-c821-4980-b141-96b68a37150e',
                'total_amount' => 1,
                'rent_amount' => 1,
                'expense_amount' => 1,
                'method' => 'Lorem ip',
                'date' => '2018-11-15',
                'prepared_id' => '8461610e-90b0-4b0e-985d-70ec271e28e8',
                'approved_id' => '808cda89-0e5f-4ee5-8c4c-ae3a0c5db7b1',
                'deposited_id' => 'b9e60230-aa47-4766-94b1-6909b9d19f6e',
                'remarks' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'complete' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1542316523,
                'account_id' => '400bd866-9ac0-48ec-9277-b65248d29428',
                'user_id' => 'b089c291-3576-4c20-bc8f-3d800edb911b',
                'account_no' => 'Lorem ipsum dolor sit amet',
                'account_name' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
