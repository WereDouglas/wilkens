<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property string $id
 * @property float $amount_paid
 * @property string $paid_by
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $bill_id
 *
 * @property \App\Model\Entity\Bill $bill
 */
class Payment extends Entity
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
        'amount_paid' => true,
        'paid_by' => true,
        'created_at' => true,
        'bill' => true
    ];
}
