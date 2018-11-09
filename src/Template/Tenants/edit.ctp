<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tenant $tenant
 */
$links_array = [
    ['List Tenants', ['action' => 'index']],
    ['List Users', ['controller' => 'Users', 'action' => 'index']]
];
$active = ['yes','no'];

$input_array = [
    ['user_id', ['options' => $users]],
    ['units._ids', ['options' => $units]],
    ['client_id', ['class' => 'form-control']],
    ['start_date', ['class' => 'form-control', 'placeholder' => 'Start date']],
    ['end_date', ['class' => 'form-control', 'placeholder' => 'Ending']],
    ['rent_start_due_day', ['class' => 'form-control', 'placeholder' => 'Due day']],
    ['active', ['options' => $active, 'empty' => false]],
    ['notice', ['options' => $active]],
    ['amount_to_pay', ['class' => 'form-control', 'placeholder' => 'Cost']],
    ['work_address', ['class' => 'form-control']],
    ['nin', ['class' => 'form-control']],
    ['passport', ['class' => 'form-control']],
    ['created_at', ['class' => 'form-control']]
];


$this->extend('/Common/edit');
$this->assign('links', json_encode($links_array));
$this->assign('inputs', json_encode($input_array));
$this->assign('id',$ids);

$this->start('form_object');
echo $this->Form->create($tenant);
$this->end();


