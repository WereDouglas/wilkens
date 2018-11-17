<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 */


$links_array = [
    ['List Users', ['action' => 'index']],
    ['List Properties', ['action' => 'index']],
    ['List Clients', ['controller' => 'Clients', 'action' => 'index']],
    ['New Client', ['controller' => 'Clients', 'action' => 'add']]
];
$active = ['yes', 'no'];
$active = ['Flat', 'Bangalow', 'Apartments', 'Office Space'];

$input_array = [
    ['name', ['class' => 'form-control']],
    ['details', ['class' => 'form-control']],
    ['no_of_rooms', ['class' => 'form-control']],
    ['manager_id', ['class' => 'form-control']],
    ['legal_id', ['class' => 'form-control']],
    ['terms', ['class' => 'form-control']],
    ['location', ['options' => $active, 'empty' => false]],
    ['category', ['options' => $category]],
    ['lng', ['class' => 'form-control']],
    ['lat', ['class' => 'form-control']],
    ['commission', ['class' => 'form-control']],
    ['created_at', ['class' => 'form-control']]
];

$this->extend('/Common/edit');
$this->assign('links', json_encode($links_array));
$this->assign('inputs', json_encode($input_array));
$this->assign('id', $ids);

$this->start('form_object');
echo $this->Form->create($property);
$this->end();
