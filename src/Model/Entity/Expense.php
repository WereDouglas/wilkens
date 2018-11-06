<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Expense Entity
 *
 * @property string $id
 * @property string $item
 * @property float $qty
 * @property float $cost
 * @property float $total
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $requisition_id
 *
 * @property \App\Model\Entity\Requisition $requisition
 */
class Expense extends Entity
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
        'item' => true,
        'qty' => true,
        'cost' => true,
        'total' => true,
        'created_at' => true,
        'requisition' => true
    ];
}
