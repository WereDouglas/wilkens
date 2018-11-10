<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tenant Entity
 *
 * @property string $id
 * @property string $start_date
 * @property string $end_date
 * @property string $rent_start_due_day
 * @property string $active
 * @property string $notice
 * @property string $amount_to_pay
 * @property string $work_address
 * @property string $nin
 * @property string $passport
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $user_id
 * @property string $client_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Confiscation[] $confiscations
 * @property \App\Model\Entity\Damage[] $damages
 * @property \App\Model\Entity\Eviction[] $evictions
 * @property \App\Model\Entity\Penalty[] $penalties
 * @property \App\Model\Entity\Refund[] $refunds
 * @property \App\Model\Entity\Rent[] $rents
 * @property \App\Model\Entity\Security[] $securities
 * @property \App\Model\Entity\Utility[] $utilities
 * @property \App\Model\Entity\Unit[] $units
 */
class Tenant extends Entity
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
        'start_date' => true,
        'end_date' => true,
        'rent_start_due_day' => true,
        'active' => true,
        'notice' => true,
        'amount_to_pay' => true,
        'work_address' => true,
        'nin' => true,
        'passport' => true,
        'created_at' => true,
        'user_id' => true,
        'client_id' => true,
        'user' => true,
        'client' => true,
        'confiscations' => true,
        'damages' => true,
        'evictions' => true,
        'penalties' => true,
        'refunds' => true,
        'rents' => true,
        'securities' => true,
        'utilities' => true,
        'units' => true
    ];
}
