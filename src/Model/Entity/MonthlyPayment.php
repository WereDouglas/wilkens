<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MonthlyPayment Entity
 *
 * @property string $id
 * @property float $total_amount
 * @property float $to_client
 * @property float $for_commission
 * @property string $month
 * @property string $year
 * @property \Cake\I18n\FrozenDate $date
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $rent_id
 *
 * @property \App\Model\Entity\Rent $rent
 */
class MonthlyPayment extends Entity
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
        'total_amount' => true,
        'to_client' => true,
        'for_commission' => true,
        'month' => true,
        'year' => true,
        'date' => true,
        'created_at' => true,
        'rent' => true
    ];
}
