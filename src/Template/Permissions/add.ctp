<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permission $permission
 */
$links_array = [
    ['List Roles', ['action' => 'index']],
    ['List Permissions', ['controller' => 'Permissions', 'action' => 'index']]
];

$input_array = [
    ['description', ['class' => 'form-control', 'placeholder' => 'Permission']],
    ['roles._ids', ['options' => $roles]],
    ['users._ids', [ 'options' => $users]]
];


$this->extend('/Common/add');
$this->assign('links', json_encode($links_array));
$this->assign('inputs', json_encode($input_array));

$this->start('form_object');
echo $this->Form->create($permission);
$this->end();
