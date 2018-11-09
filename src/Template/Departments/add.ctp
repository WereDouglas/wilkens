<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Department $department
 */


$links_array = [
    ['List Departments', ['action' => 'index']]
];

$input_array = [
    ['name', ['class' => 'form-control']],
    ['company_id', ['options' => $companies,'empty' => false]]
];
$this->extend('/Common/add');
$this->assign('links', json_encode($links_array));
$this->assign('inputs', json_encode($input_array));
$this->assign('title', 'Department');
$this->start('form_object');
echo $this->Form->create($department, ['type' =>'file']);
$this->end();
