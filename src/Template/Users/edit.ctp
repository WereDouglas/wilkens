<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$links_array = [
    ['List Users', ['action' => 'index']]
];
$active = ['yes','no'];

$input_array = [
    ['first_name', ['class' => 'form-control']],
    ['last_name', ['class' => 'form-control']],
    ['contact', ['class' => 'form-control']],
    ['email', ['class' => 'form-control']],
    ['photo', ['class' => 'form-control', 'type' => 'file']],
    ['address', ['class' => 'form-control']],
    ['password', ['class' => 'form-control']],
    ['active', ['options' => $active]],
    ['created_at', ['class' => 'form-control']],
    ['contact', ['class' => 'form-control']],
    ['company_id', ['options' => $companies],'empty'=>true],
    ['permissions_ids', ['options' => $permissions]],
    ['roles_ids', ['options' => $roles]],
];


$this->extend('/Common/edit');
$this->assign('links', json_encode($links_array));
$this->assign('inputs', json_encode($input_array));
$this->assign('id',$ids);

$this->start('form_object');
echo $this->Form->create($user, ['type' =>'file']);
$this->end();

