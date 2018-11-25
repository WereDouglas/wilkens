<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Company Entity
 *
 * @property string $id
 * @property string $name
 * @property string $address
 * @property $photo
 * @property string $photo_dir
 * @property string $photo_size
 * @property string $photo_type
 *
 * @property \App\Model\Entity\Branch[] $branches
 * @property \App\Model\Entity\Department[] $departments
 * @property \App\Model\Entity\Employee[] $employees
 * @property \App\Model\Entity\Message[] $messages
 * @property \App\Model\Entity\User[] $users
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
        'id' => true,
        'name' => true,
        'address' => true,
        'photo' => true,
        'photo_dir' => true,
        'photo_size' => true,
        'photo_type' => true,
        'branches' => true,
        'departments' => true,
        'employees' => true,
        'messages' => true,
        'users' => true
    ];
    protected function _getFullUrl()
    {
        return $this->_properties['photo_dir'] . '' . $this->_properties['photo'];
    }
}
