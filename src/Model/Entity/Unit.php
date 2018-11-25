<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Unit Entity
 *
 * @property string $id
 * @property string $types
 * @property string $name
 * @property string $states
 * @property string $occupied
 * @property float $cost
 * @property string $description
 * @property int $rooms
 * @property string $property_id
 * @property string $user_id
 *
 * @property \App\Model\Entity\Property $property
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Requisition[] $requisitions
 * @property \App\Model\Entity\Tenant[] $tenants
 */
class Unit extends Entity
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
        'types' => true,
        'name' => true,
        'states' => true,
        'occupied' => true,
        'cost' => true,
        'description' => true,
        'rooms' => true,
        'property_id' => true,
        'user_id' => true,
        'property' => true,
        'user' => true,
        'requisitions' => true,
        'tenants' => true
    ];
}
