<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rent Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenDate $date
 * @property string $method
 * @property string $no
 * @property float $total_cost
 * @property float $total_paid
 * @property float $for_client
 * @property float $percentage_used
 * @property float $for_commission
 * @property string $paid_to_client
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $end_date
 * @property int $unpaid_months
 * @property int $paid_months
 * @property float $vat
 * @property float $balance
 * @property string $branch_id
 * @property string $cheque_no
 * @property string $receive_id
 * @property string $editable
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $landlord_id
 * @property string $deposit_id
 * @property string $occupant_id
 * @property string $unit_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Deposit $deposit
 * @property \App\Model\Entity\Tenant $tenant
 * @property \App\Model\Entity\MonthlyPayment[] $monthly_payments
 */
class Rent extends Entity
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
        'date' => true,
        'method' => true,
        'no' => true,
        'total_cost' => true,
        'total_paid' => true,
        'for_client' => true,
        'percentage_used' => true,
        'for_commission' => true,
        'paid_to_client' => true,
        'start_date' => true,
        'end_date' => true,
        'unpaid_months' => true,
        'paid_months' => true,
        'vat' => true,
        'balance' => true,
        'branch_id' => true,
        'cheque_no' => true,
        'receive_id' => true,
        'editable' => true,
        'created_at' => true,
        'landlord_id' => true,
        'deposit_id' => true,
        'occupant_id' => true,
        'unit_id' => true,
        'user' => true,
        'branch' => true,
        'employee' => true,
        'client' => true,
        'deposit' => true,
        'tenant' => true,
        'monthly_payments' => true
    ];
}
