<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */

$links_array = [
    ['List Clients', ['action' => 'index']]
];
$active = ['yes','no'];


$input_array = [
    ['user_id', ['options' => $users]],
    ['commission', ['class' => 'form-control', 'placeholder' => '%']],
    ['contract', ['class' => 'form-control', 'placeholder' => 'Contract period']],
    ['start_date', ['class' => 'form-control', 'placeholder' => 'Starting']],
    ['end_date', ['class' => 'form-control', 'placeholder' => 'Ending','empty' => true]],
    ['active', ['options' => $active, 'empty' => false]],
    ['payment_terms', ['class' => 'form-control']],
    ['code', ['class' => 'form-control', 'placeholder' => 'Code']],
    ['delivery_method', ['class' => 'form-control', 'placeholder' => 'Method of report delivery']],
    ['created_at', ['class' => 'form-control', 'placeholder' => 'Created at']],
];


$this->extend('/Common/edit');
$this->assign('links', json_encode($links_array));
$this->assign('inputs', json_encode($input_array));
$this->assign('id',$ids);

$this->start('form_object');
echo $this->Form->create($client);
$this->end();
