<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Installment Entity
 *
 * @property string $id
 * @property string $user_id
 * @property float $amount
 * @property string $paid
 * @property int $no
 * @property \Cake\I18n\FrozenDate $date
 * @property string $received_id
 * @property string $method
 * @property \Cake\I18n\FrozenDate $deadline
 * @property float $balance
 *
 * @property \App\Model\Entity\User $user
 */
class Installment extends Entity
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
        'user_id' => true,
        'amount' => true,
        'paid' => true,
        'no' => true,
        'date' => true,
        'received_id' => true,
        'method' => true,
        'deadline' => true,
        'balance' => true,
        'user' => true
    ];
}
