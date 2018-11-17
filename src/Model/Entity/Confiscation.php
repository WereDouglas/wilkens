<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Confiscation Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenDate $date
 * @property string $details
 * @property float $cost
 * @property string $sold
 * @property \Cake\I18n\FrozenDate $sold_on
 * @property string $sold_id
 * @property float $storage_fees
 * @property \Cake\I18n\FrozenDate $deadline
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $user_id
 *
 * @property \App\Model\Entity\User $user
 */
class Confiscation extends Entity
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
        'date' => true,
        'details' => true,
        'cost' => true,
        'sold' => true,
        'sold_on' => true,
        'sold_id' => true,
        'storage_fees' => true,
        'deadline' => true,
        'created_at' => true,
        'user_id' => true,
        'user' => true
    ];
}
