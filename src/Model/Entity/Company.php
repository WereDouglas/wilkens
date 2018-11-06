<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Company Entity
 *
 * @property string $id
 * @property string $name
 * @property string $address
 * @property string $photo
 *
 * @property \App\Model\Entity\Branch[] $branches
 * @property \App\Model\Entity\Department[] $departments
 * @property \App\Model\Entity\Message[] $messages
 * @property \App\Model\Entity\Requisition[] $requisitions
 */
class Company extends Entity
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
        'address' => true,
        'photo' => true,
        'branches' => true,
        'departments' => true,
        'messages' => true,
        'requisitions' => true
    ];
}
