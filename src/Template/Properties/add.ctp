<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 */

$links_array = [
    ['List Properties', ['action' => 'index']],
    ['List Clients', ['controller' => 'Clients', 'action' => 'index']],
    ['New Client', ['controller' => 'Clients', 'action' => 'add']]
];
$active =['yes','no'];
$active =['Flat','Bangalow','Apartments','Office Space'];

$input_array = [
    ['name', ['class' => 'form-control', 'placeholder' => 'Name']],
    ['details', ['class' => 'form-control', 'placeholder' => 'Details']],
    ['no_of_rooms', ['class' => 'form-control', 'placeholder' => 'No of rooms']],
    ['manager_id', ['class' => 'form-control', 'placeholder' => 'Manager']],
    ['legal_id', ['class' => 'form-control', 'placeholder' => 'Estate Legal']],
    ['terms', ['class' => 'form-control', 'placeholder' => 'Terms']],
    ['location', ['options' => $active, 'empty' => false]],
    ['category', ['options' => $category]],
    ['lng', ['class' => 'form-control', 'placeholder' => 'Longitude']],
    ['lat', ['class' => 'form-control', 'placeholder' => 'Latitude']],
    ['commission', ['class' => 'form-control', 'placeholder' => 'Commission']],
    ['created_at', ['class' => 'form-control', 'placeholder' => 'Created at']]

];

$this->extend('/Common/add');
$this->assign('links', json_encode($links_array));
$this->assign('inputs', json_encode($input_array));

$this->start('form_object');
echo $this->Form->create($property);
$this->end();
