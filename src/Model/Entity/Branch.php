<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Branch Entity
 *
 * @property string $id
 * @property string $name
 * @property string $company_id
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Employee[] $employees
 * @property \App\Model\Entity\Rent[] $rents
 */
class Branch extends Entity
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
        'company_id' => true,
        'company' => true,
        'employees' => true,
        'rents' => true
    ];
}
