<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property[]|\Cake\Collection\CollectionInterface $properties
 */



$links_array = [
    ['New Account', ['action' => 'add']],
    ['New Property', ['action' => 'add']],
    ['List Clients', ['controller' => 'Clients', 'action' => 'index']],
    ['New Client', ['controller' => 'Clients', 'action' => 'add']]
];

$headers = ['client', 'id', 'name','no_of_rooms','manager', 'legal','location','category','lng','lat', 'commission','created_at'];
//$property->has('client') ? $this->Html->link($property->client->id, ['controller' => 'Clients', 'action' => 'view', $property->client->id]) : ''
$objects = $properties->map(function ($property) use ($headers) {
    return $property->extract($headers);
});

$this->extend('/Common/table');
$this->assign('links', json_encode($links_array));
$this->assign('page_header', "Properties");
$this->set(compact('headers', 'objects'));


?>
