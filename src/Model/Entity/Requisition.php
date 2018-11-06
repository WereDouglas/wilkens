<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Requisition Entity
 *
 * @property string $id
 * @property string $type
 * @property \Cake\I18n\FrozenDate $date
 * @property string $details
 * @property string $no
 * @property string $remarks
 * @property string $approved
 * @property string $approved_by
 * @property string $paid
 * @property string $paid_by
 * @property string $method
 * @property string $repaired
 * @property string $requested_by_id
 * @property string $manager_id
 * @property string $category
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $client_id
 * @property string $company_id
 * @property string $property_id
 *
 * @property \App\Model\Entity\RequestedBy $requested_by
 * @property \App\Model\Entity\Manager $manager
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Property $property
 * @property \App\Model\Entity\Expense[] $expenses
 */
class Requisition extends Entity
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
        'type' => true,
        'date' => true,
        'details' => true,
        'no' => true,
        'remarks' => true,
        'approved' => true,
        'approved_by' => true,
        'paid' => true,
        'paid_by' => true,
        'method' => true,
        'repaired' => true,
        'requested_by_id' => true,
        'manager_id' => true,
        'category' => true,
        'created_at' => true,
        'client_id' => true,
        'company_id' => true,
        'property_id' => true,
        'requested_by' => true,
        'manager' => true,
        'client' => true,
        'company' => true,
        'property' => true,
        'expenses' => true
    ];
}
