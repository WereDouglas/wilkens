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
 * @property string $approved_id
 * @property string $paid
 * @property string $paid_id
 * @property string $method
 * @property string $repaired
 * @property string $requested_id
 * @property string $category
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $user_id
 * @property string $property_id
 * @property string $unit_id
 *
 * @property \App\Model\Entity\User $user
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
        'id' => true,
        'type' => true,
        'date' => true,
        'details' => true,
        'no' => true,
        'remarks' => true,
        'approved' => true,
        'approved_id' => true,
        'paid' => true,
        'paid_id' => true,
        'method' => true,
        'repaired' => true,
        'requested_id' => true,
        'category' => true,
        'created_at' => true,
        'user_id' => true,
        'property_id' => true,
        'unit_id' => true,
        'user' => true,
        'expenses' => true
    ];
}
