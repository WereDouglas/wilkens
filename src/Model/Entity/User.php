<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/**
 * User Entity
 *
 * @property string $id
 * @property string $first_name
 * @property string $last_name
 * @property string $contact
 * @property string $email
 * @property string $photo
 * @property string $address
 * @property string $password
 * @property string $active
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $photo_dir
 * @property float $photo_size
 * @property string $photo_type
 * @property string $type
 * @property string $title
 * @property string $company_id
 * @property string $user_id
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Account[] $accounts
 * @property \App\Model\Entity\Bill[] $bills
 * @property \App\Model\Entity\Client[] $clients
 * @property \App\Model\Entity\Confiscation[] $confiscations
 * @property \App\Model\Entity\Contact[] $contacts
 * @property \App\Model\Entity\Damage[] $damages
 * @property \App\Model\Entity\Deposit[] $deposits
 * @property \App\Model\Entity\Employee[] $employees
 * @property \App\Model\Entity\Eviction[] $evictions
 * @property \App\Model\Entity\Installment[] $installments
 * @property \App\Model\Entity\Kin[] $kins
 * @property \App\Model\Entity\Log[] $logs
 * @property \App\Model\Entity\MonthlyPayment[] $monthly_payments
 * @property \App\Model\Entity\Password[] $passwords
 * @property \App\Model\Entity\Penalty[] $penalties
 * @property \App\Model\Entity\Property[] $properties
 * @property \App\Model\Entity\Refund[] $refunds
 * @property \App\Model\Entity\Requisition[] $requisitions
 * @property \App\Model\Entity\Security[] $securities
 * @property \App\Model\Entity\Tenant[] $tenants
 * @property \App\Model\Entity\TenantsUnit[] $tenants_units
 * @property \App\Model\Entity\Unit[] $units
 * @property \App\Model\Entity\Utility[] $utilities
 * @property \App\Model\Entity\Permission[] $permissions
 * @property \App\Model\Entity\Role[] $roles
 */
class User extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'contact' => true,
        'email' => true,
        'photo' => true,
        'address' => true,
        'password' => true,
        'active' => true,
        'created_at' => true,
        'photo_dir' => true,
        'photo_size' => true,
        'photo_type' => true,
        'type' => true,
        'title' => true,
        'company_id' => true,
        'user_id' => true,
        'company' => true,
        'users' => true,
        'accounts' => true,
        'bills' => true,
        'clients' => true,
        'confiscations' => true,
        'contacts' => true,
        'damages' => true,
        'deposits' => true,
        'employees' => true,
        'evictions' => true,
        'installments' => true,
        'kins' => true,
        'logs' => true,
        'monthly_payments' => true,
        'passwords' => true,
        'penalties' => true,
        'properties' => true,
        'refunds' => true,
        'requisitions' => true,
        'securities' => true,
        'tenants' => true,
        'tenants_units' => true,
        'units' => true,
        'utilities' => true,
        'permissions' => true,
        'roles' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _getFullName()
    {
        return $this->_properties['first_name'] . '  ' .
            $this->_properties['last_name'];
    }

    protected function _getFullUrl()
    {
        return $this->_properties['photo_dir'] . '' . $this->_properties['photo'];
    }
    protected function _setPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($value);
        }
    }
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('contact', 'A contact is required')
            ->notEmpty('password', 'A password is required');
    }

}
