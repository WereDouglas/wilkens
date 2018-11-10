<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property string $id
 * @property float $commission
 * @property float $contract
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $end_date
 * @property string $active
 * @property string $payment_terms
 * @property string $code
 * @property string $delivery_method
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $user_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Deposit[] $deposits
 * @property \App\Model\Entity\Property[] $properties
 * @property \App\Model\Entity\Requisition[] $requisitions
 * @property \App\Model\Entity\Tenant[] $tenants
 */
class Client extends Entity
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
        'commission' => true,
        'contract' => true,
        'start_date' => true,
        'end_date' => true,
        'active' => true,
        'payment_terms' => true,
        'code' => true,
        'delivery_method' => true,
        'created_at' => true,
        'user_id' => true,
        'user' => true,
        'deposits' => true,
        'properties' => true,
        'requisitions' => true,
        'tenants' => true
    ];
}