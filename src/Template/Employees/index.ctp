<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
 */


$links_array = [
    ['New Account', ['action' => 'add']]];

$headers = ['photo','id','user_name','company_name','branch','department','start_date','end_date','active' ,'address','no','created_at','photo_dir'];

 //$employee->has('user') ? $this->Html->link($employee->user->first_name, ['controller' => 'Users', 'action' => 'view', $employee->user->id]) : '' ;
//$employee->has('company') ? $this->Html->link($employee->company->name, ['controller' => 'Companies', 'action' => 'view', $employee->company->id]) : '' ;
//$employee->has('branch') ? $this->Html->link($employee->branch->name, ['controller' => 'Branches', 'action' => 'view', $employee->branch->id]) : '' ;
 //$employee->has('department') ? $this->Html->link($employee->department->name, ['controller' => 'Departments', 'action' => 'view', $employee->department->id]) : '' ;

$objects = $employees->map(function ($employee) use ($headers) {
    return $employee->extract($headers);
});


$this->extend('/Common/table');
$this->assign('links', json_encode($links_array));
$this->assign('page_header', "Employees");
$this->set(compact('headers', 'objects'));
