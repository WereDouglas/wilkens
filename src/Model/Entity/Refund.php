<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Refund Entity
 *
 * @property string $id
 * @property float $amount
 * @property float $bills
 * @property float $damages
 * @property float $rent_due
 * @property float $amount_refundable
 * @property \Cake\I18n\FrozenDate $date
 * @property string $paid
 * @property string $approved
 * @property string $approved_by
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $tenant_id
 *
 * @property \App\Model\Entity\Tenant $tenant
 */
class Refund extends Entity
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
        'amount' => true,
        'bills' => true,
        'damages' => true,
        'rent_due' => true,
        'amount_refundable' => true,
        'date' => true,
        'paid' => true,
        'approved' => true,
        'approved_by' => true,
        'created_at' => true,
        'tenant_id' => true,
        'tenant' => true
    ];
}
