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

$headers = new \Cake\Collection\Collection( [ 'id', 'name','no_of_rooms','manager_id', 'legal_id','terms','location','category','lng','lat', 'commission','created_at','client_id']);
//$property->has('client') ? $this->Html->link($property->client->id, ['controller' => 'Clients', 'action' => 'view', $property->client->id]) : ''
$objects = $accounts->map(function ($account) use ($headers) {
    return $headers->map(function ($header) use ($account) {
        return $account->get($header);
    });
});

$this->extend('/Common/table');
$this->assign('links', json_encode($links_array));
$this->assign('page_header', "Accounts");
$this->set(compact('headers', 'objects'));


?>
