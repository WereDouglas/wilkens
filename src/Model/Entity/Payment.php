<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property string $id
 * @property string $bill_id
 * @property float $amount
 * @property \Cake\I18n\FrozenDate $date
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $reciever_id
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
        'id' => true,
        'bill_id' => true,
        'amount' => true,
        'date' => true,
        'created_at' => true,
        'reciever_id' => true,
        'bill' => true
    ];
}
