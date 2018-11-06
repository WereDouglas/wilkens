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
 * @property string $paid_by
 * @property string $paid_to_client
 * @property string $banking_deposit_id
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $end_date
 * @property int $unpaid_months
 * @property int $paid_months
 * @property float $vat
 * @property float $balance
 * @property string $branch_id
 * @property string $cheque_no
 * @property string $recieved_by
 * @property string $editable
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $tenant_id
 *
 * @property \App\Model\Entity\BankingDeposit $banking_deposit
 * @property \App\Model\Entity\Branch $branch
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
        'date' => true,
        'method' => true,
        'no' => true,
        'total_cost' => true,
        'total_paid' => true,
        'for_client' => true,
        'percentage_used' => true,
        'for_commission' => true,
        'paid_by' => true,
        'paid_to_client' => true,
        'banking_deposit_id' => true,
        'start_date' => true,
        'end_date' => true,
        'unpaid_months' => true,
        'paid_months' => true,
        'vat' => true,
        'balance' => true,
        'branch_id' => true,
        'cheque_no' => true,
        'recieved_by' => true,
        'editable' => true,
        'created_at' => true,
        'tenant_id' => true,
        'banking_deposit' => true,
        'branch' => true,
        'tenant' => true,
        'monthly_payments' => true
    ];
}
