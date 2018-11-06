<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bill Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenDate $created_on
 * @property \Cake\I18n\FrozenDate $due_date
 * @property string $previous_reading
 * @property string $current_reading
 * @property string $units_used
 * @property float $unit_cost
 * @property float $total_cost
 * @property string $created_by
 * @property string $paid
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $utility_id
 *
 * @property \App\Model\Entity\Utility $utility
 * @property \App\Model\Entity\Payment[] $payments
 */
class Bill extends Entity
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
        'created_on' => true,
        'due_date' => true,
        'previous_reading' => true,
        'current_reading' => true,
        'units_used' => true,
        'unit_cost' => true,
        'total_cost' => true,
        'created_by' => true,
        'paid' => true,
        'created_at' => true,
        'utility_id' => true,
        'utility' => true,
        'payments' => true
    ];
}
