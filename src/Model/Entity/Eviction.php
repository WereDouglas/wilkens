<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Eviction Entity
 *
 * @property string $id
 * @property float $balance
 * @property \Cake\I18n\FrozenDate $date
 * @property float $costs_incurred
 * @property float $repair_costs
 * @property float $bill_costs
 * @property float $disposal_costs
 * @property string $evicted
 * @property string $details
 * @property \Cake\I18n\FrozenDate $evicted_on
 * @property string $evicted_by
 * @property string $reason
 * @property string $remarks
 * @property string $tenant_id
 *
 * @property \App\Model\Entity\Tenant $tenant
 */
class Eviction extends Entity
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
        'balance' => true,
        'date' => true,
        'costs_incurred' => true,
        'repair_costs' => true,
        'bill_costs' => true,
        'disposal_costs' => true,
        'evicted' => true,
        'details' => true,
        'evicted_on' => true,
        'evicted_by' => true,
        'reason' => true,
        'remarks' => true,
        'tenant' => true
    ];
}
