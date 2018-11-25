<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Penalty Entity
 *
 * @property string $id
 * @property float $total
 * @property string $user_id
 * @property string $rent_id
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $paid
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Rent $rent
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
        'id'=>true,
        'total' => true,
        'user_id' => true,
        'rent_id' => true,
        'created_at' => true,
        'paid' => true,
        'user' => true,
        'rent' => true
    ];
}
