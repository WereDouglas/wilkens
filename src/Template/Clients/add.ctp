<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */


$links_array = [
    ['List Clients', ['action' => 'index']],
    ['List Users', ['controller' => 'Users', 'action' => 'index']],
    ['New User', ['controller' => 'Users', 'action' => 'add']]

];
$active = ['yes', 'no'];
$method = ['Email', 'Pickup'];

$input_array = [
    ['user_id', ['options' => $users]],
    ['commission', ['class' => 'form-control', 'placeholder' => '%']],
    ['contract', ['class' => 'form-control', 'placeholder' => 'Contract period']],
    ['start_date', ['class' => 'form-control']],
    ['end_date', ['class' => 'form-control']],
    ['active', ['options' => $active, 'empty' => false]],
    ['payment_terms', ['class' => 'form-control']],
    ['code', ['class' => 'form-control', 'placeholder' => 'Code']],
    ['delivery_method', ['options' => $method]],
    ['created_at', ['class' => 'form-control', 'placeholder' => 'Created at']]
];

$this->extend('/Common/add');
$this->assign('links', json_encode($links_array));
$this->assign('inputs', json_encode($input_array));
$this->assign('title', 'Clients');
$this->start('form_object');
echo $this->Form->create($client);
$this->end();

?>
