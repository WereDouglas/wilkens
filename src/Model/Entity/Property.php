<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Property Entity
 *
 * @property string $id
 * @property string $name
 * @property string $details
 * @property int $no_of_rooms
 * @property string $manager_id
 * @property string $legal_id
 * @property string $terms
 * @property string $location
 * @property string $category
 * @property float $lng
 * @property float $lat
 * @property int $commission
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $client_id
 *
 * @property \App\Model\Entity\Manager $manager
 * @property \App\Model\Entity\Legal $legal
 * @property \App\Model\Entity\Client $client
 */
class Property extends Entity
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
        'name' => true,
        'details' => true,
        'no_of_rooms' => true,
        'manager_id' => true,
        'legal_id' => true,
        'terms' => true,
        'location' => true,
        'category' => true,
        'lng' => true,
        'lat' => true,
        'commission' => true,
        'created_at' => true,
        'manager' => true,
        'legal' => true,
        'client' => true
    ];
}
