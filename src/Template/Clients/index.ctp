
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client[]|\Cake\Collection\CollectionInterface $clients
 */


$links_array = [
    ['New Client', ['action' => 'add']]];

$headers = ['id', 'no', 'type', 'contact', 'account_name', 'bank_name', 'user_id'];
//$client->has('user') ? $this->Html->link($client->user->first_name, ['controller' => 'Users', 'action' => 'view', $client->user->id]) : ''

$objects = $clients->map(function ($client) use ($headers) {
    return $client->extract($headers);
});

$this->extend('/Common/table');
$this->assign('links', json_encode($links_array));
$this->assign('page_header', "Clients");
$this->set(compact('headers', 'objects'));


