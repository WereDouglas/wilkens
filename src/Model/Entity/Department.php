<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Department Entity
 *
 * @property string $id
 * @property string $name
 * @property string $company_id
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Employee[] $employees
 */
class Department extends Entity
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
        'company_id' => true,
        'company' => true,
        'employees' => true
    ];
}
