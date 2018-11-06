<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Security Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenDate $date
 * @property float $amount
 * @property string $method
 * @property string $paid_back
 * @property string $approved
 * @property string $requested_by
 * @property string $approved_by
 * @property string $refunded
 * @property int $no
 * @property string $tenant_id
 *
 * @property \App\Model\Entity\Tenant $tenant
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
        'date' => true,
        'amount' => true,
        'method' => true,
        'paid_back' => true,
        'approved' => true,
        'requested_by' => true,
        'approved_by' => true,
        'refunded' => true,
        'no' => true,
        'tenant_id' => true,
        'tenant' => true
    ];
}
