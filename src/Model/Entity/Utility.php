<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Utility Entity
 *
 * @property string $id
 * @property string $name
 * @property string $starting_reading
 * @property float $unit_cost
 * @property string $account_no
 * @property string $user_id
 *
 * @property \App\Model\Entity\User $user
 */
class Utility extends Entity
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
        'name' => true,
        'starting_reading' => true,
        'unit_cost' => true,
        'account_no' => true,
        'user_id' => true,
        'user' => true
    ];
}
