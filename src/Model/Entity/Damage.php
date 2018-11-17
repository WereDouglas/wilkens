<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Damage Entity
 *
 * @property string $id
 * @property string $details
 * @property float $amount
 * @property \Cake\I18n\FrozenDate $date
 * @property string $prepared_id
 * @property string $paid
 * @property string $repaired
 * @property \Cake\I18n\FrozenDate $date_repaired
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $user_id
 *
 * @property \App\Model\Entity\User $user
 */
class Damage extends Entity
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
        'details' => true,
        'amount' => true,
        'date' => true,
        'prepared_id' => true,
        'paid' => true,
        'repaired' => true,
        'date_repaired' => true,
        'created_at' => true,
        'user_id' => true,
        'user' => true
    ];
}
