<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Account Entity
 *
 * @property string $id
 * @property string $no
 * @property string $type
 * @property string $account_name
 * @property string $bank_name
 * @property string $user_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Deposit[] $deposits
 */
class Account extends Entity
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
        'id' => true,
        'no' => true,
        'type' => true,
        'account_name' => true,
        'bank_name' => true,
        'user_id' => true,
        'user' => true,
        'deposits' => true
    ];
}
