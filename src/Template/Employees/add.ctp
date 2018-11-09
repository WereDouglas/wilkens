<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
$links_array = [
    ['List Employees', ['action' => 'index']],
    ['List Users', ['controller' => 'Users', 'action' => 'index']],
    ['New User', ['controller' => 'Users', 'action' => 'add']]
];
$active =['yes','no'];
$input_array = [
    ['user_id', ['options' => $users]],
    ['company_id', ['options' => $companies]],
    ['branch_id', ['options' => $branches]],
    ['department_id', ['options' => $departments]],
    ['start_date', ['class' => 'form-control']],
    ['end_date', ['class' => 'form-control']],
    ['active', ['options' => $active]],
    ['address', ['class' => 'form-control']],
    ['no', ['class' => 'form-control']],
    ['created_at', ['class' => 'form-control']]

];
$this->extend('/Common/add');
$this->assign('links', json_encode($links_array));
$this->assign('inputs', json_encode($input_array));

$this->start('form_object');
echo $this->Form->create($employee, ['type' =>'file']);
$this->end();
