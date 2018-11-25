<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Deposit Entity
 *
 * @property string $id
 * @property float $total_amount
 * @property float $rent_amount
 * @property float $expense_amount
 * @property string $method
 * @property \Cake\I18n\FrozenDate $date
 * @property string $prepared_id
 * @property string $approved_id
 * @property string $deposited_id
 * @property string $remarks
 * @property string $complete
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $account_id
 * @property string $user_id
 * @property string $account_no
 * @property string $account_name
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Account $account
 * @property \App\Model\Entity\Rent[] $rents
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
        'id'=>true,
        'total_amount' => true,
        'rent_amount' => true,
        'expense_amount' => true,
        'method' => true,
        'date' => true,
        'prepared_id' => true,
        'approved_id' => true,
        'deposited_id' => true,
        'remarks' => true,
        'complete' => true,
        'created_at' => true,
        'account_id' => true,
        'user_id' => true,
        'account_no' => true,
        'account_name' => true,
        'user' => true,
        'account' => true,
        'rents' => true
    ];
}
