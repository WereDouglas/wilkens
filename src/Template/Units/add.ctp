<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Unit $unit
 */
$links_array = [
    ['List Units', ['action' => 'index']],
    ['List Properties', ['controller' => 'Properties', 'action' => 'index']],
    ['New Property', ['controller' => 'Properties', 'action' => 'add']],
    ['List Tenants', ['controller' => 'Tenants', 'action' => 'index']],
    ['New Tenant', ['controller' => 'Tenants', 'action' => 'add']]

];
$active =['yes','no'];
$state =['Occupied','Vacant'];
$type =['Single room','House','Office'];
$input_array = [
    ['type', ['options' => $type]],
    ['name', ['class' => 'form-control', 'placeholder' => 'Name']],
    ['state', ['options' => $state]],
    ['occupied', ['options' => $active]],
    ['cost', ['class' => 'form-control', 'placeholder' => 'Cost']],
    ['description', ['class' => 'form-control', 'placeholder' => 'Details']],
    ['rooms', ['class' => 'form-control', 'placeholder' => 'No of rooms']],
    ['property_id', ['options' => $properties]],
    ['tenants._ids', ['options' => $tenants]],

];

$this->extend('/Common/add');
$this->assign('links', json_encode($links_array));
$this->assign('inputs', json_encode($input_array));
$this->assign('title', 'Room/Unit');
$this->start('form_object');
echo $this->Form->create($unit, ['type' =>'file']);
$this->end();
