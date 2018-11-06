<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

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
 * @property string $company_id
 * @property string $photo_dir
 * @property float $photo_size
 * @property string $photo_type
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Account[] $accounts
 * @property \App\Model\Entity\Client[] $clients
 * @property \App\Model\Entity\Contact[] $contacts
 * @property \App\Model\Entity\Employee[] $employees
 * @property \App\Model\Entity\Kin[] $kins
 * @property \App\Model\Entity\Password[] $passwords
 * @property \App\Model\Entity\Tenant[] $tenants
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
        'first_name' => true,
        'last_name' => true,
        'contact' => true,
        'email' => true,
        'photo' => true,
        'address' => true,
        'password' => true,
        'active' => true,
        'created_at' => true,
        'company_id' => true,
        'photo_dir' => true,
        'photo_size' => true,
        'photo_type' => true,
        'company' => true,
        'accounts' => true,
        'clients' => true,
        'contacts' => true,
        'employees' => true,
        'kins' => true,
        'passwords' => true,
        'tenants' => true,
        'permissions' => true,
        'roles' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'id',
        'password'
    ];
}
