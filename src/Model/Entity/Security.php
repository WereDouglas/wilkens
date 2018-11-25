<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Security Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $date
 * @property float $amount
 * @property string $method
 * @property string $paid_back
 * @property string $approved
 * @property string $requested_id
 * @property string $approved_id
 * @property float $refunded
 * @property string $user_id
 *
 * @property \App\Model\Entity\User $user
 */
class Security extends Entity
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
        'date' => true,
        'amount' => true,
        'method' => true,
        'paid_back' => true,
        'approved' => true,
        'requested_id' => true,
        'approved_id' => true,
        'refunded' => true,
        'user_id' => true,
        'user' => true
    ];
}
