<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Penalty Entity
 *
 * @property string $id
 * @property float $total
 * @property string $paid_by
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $tenant_id
 *
 * @property \App\Model\Entity\Tenant $tenant
 */
class Penalty extends Entity
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
        'total' => true,
        'paid_by' => true,
        'created_at' => true,
        'tenant' => true
    ];
}
