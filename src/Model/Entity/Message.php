<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Message Entity
 *
 * @property int $id
 * @property string $content
 * @property string $contact
 * @property string $subject
 * @property string $statuscode
 * @property string $messageid
 * @property string $cost
 * @property string $type
 * @property string $by
 * @property string $sent
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $company_id
 *
 * @property \App\Model\Entity\Company $company
 */
class Message extends Entity
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
        'content' => true,
        'contact' => true,
        'subject' => true,
        'statuscode' => true,
        'messageid' => true,
        'cost' => true,
        'type' => true,
        'by' => true,
        'sent' => true,
        'created_at' => true,
        'company' => true
    ];
}
