<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Deposit Entity
 *
 * @property string $id
 * @property float $rent_amount
 * @property float $expense_amount
 * @property string $method
 * @property \Cake\I18n\FrozenDate $date
 * @property string $prepared_by
 * @property string $approved_by
 * @property string $deposited_by
 * @property string $remarks
 * @property string $complete
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $client_id
 * @property string $account_id
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Account $account
 */
class Deposit extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'rent_amount' => true,
        'expense_amount' => true,
        'method' => true,
        'date' => true,
        'prepared_by' => true,
        'approved_by' => true,
        'deposited_by' => true,
        'remarks' => true,
        'complete' => true,
        'created_at' => true,
        'account_id' => true,
        'client' => true,
        'account' => true
    ];
}
