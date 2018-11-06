<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User  $user
 */
$links_array = [
    ['List Users', ['action' => 'index']],

];
$active =['yes','no'];

$input_array = [
    ['first_name', ['class' => 'form-control', 'placeholder' => 'First name']],
    ['last_name', ['class' => 'form-control', 'placeholder' => 'Last name']],
    ['contact', ['class' => 'form-control', 'placeholder' => 'Contact']],
    ['email', ['class' => 'form-control', 'placeholder' => 'Email']],
    ['address', ['class' => 'form-control', 'placeholder' => 'Address']],
    ['password', ['class' => 'form-control', 'placeholder' => 'Password']],
    ['active', ['options' => $active, 'empty' => false]],
    ['photo', ['type' => 'file', 'class' => 'form-control']],
    ['company_id', ['options' => $companies, 'empty' => true]],
    ['permissions._ids', ['options' => $permissions]],
    ['roles._ids', ['options' => $roles]]
];

$this->extend('/Common/add');
$this->assign('links', json_encode($links_array));
$this->assign('inputs', json_encode($input_array));

$this->start('form_object');
echo $this->Form->create($user);
$this->end();
