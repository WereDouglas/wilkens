<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PaymentsFixture
 *
 */
class PaymentsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'bill_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'amount' => ['type' => 'float', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created_at' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'reciever_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_payments_bills1_idx1' => ['type' => 'index', 'columns' => ['bill_id'], 'length' => []],
            'fk_payments_reciever_id_idx' => ['type' => 'index', 'columns' => ['reciever_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_payments_bills1' => ['type' => 'foreign', 'columns' => ['bill_id'], 'references' => ['bills', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_payments_reciever_id' => ['type' => 'foreign', 'columns' => ['reciever_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'id' => '28b5bd04-c99a-4bf4-9ecc-a3faa212f39c',
                'bill_id' => 'e742bafa-21c5-463d-96bc-206222962a68',
                'amount' => 1,
                'date' => '2018-11-15',
                'created_at' => 1542316525,
                'reciever_id' => '7b6e7074-1f34-41cf-9303-4323ad7eff2e'
            ],
        ];
        parent::init();
    }
}
