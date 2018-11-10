<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property string $id
 * @property string $user_id
 * @property string $company_id
 * @property string $branch_id
 * @property string $department_id
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $end_date
 * @property string $active
 * @property string $address
 * @property string $no
 * @property \Cake\I18n\FrozenTime $created_at
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\Department $department
 */
class Employee extends Entity
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
        'user_id' => true,
        'company_id' => true,
        'branch_id' => true,
        'department_id' => true,
        'start_date' => true,
        'end_date' => true,
        'active' => true,
        'address' => true,
        'no' => true,
        'created_at' => true,
        'user' => true,
        'company' => true,
        'branch' => true,
        'department' => true
    ];
}
