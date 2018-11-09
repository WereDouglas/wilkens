<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Account $account
 */
$links_array = [
    ['List Accounts', ['action' => 'index']],

];

$input_array = [
    ['no', ['class' => 'form-control', 'placeholder' => 'Account No.']],
    ['type', ['class' => 'form-control', 'placeholder' => 'Account type']],
    ['account_name', ['class' => 'form-control', 'placeholder' => 'Account name']],
    ['bank_name', ['class' => 'form-control', 'placeholder' => 'Bank Name']],
    ['user_id', ['options' => $users]]
];


$this->extend('/Common/add');
$this->assign('links', json_encode($links_array));
$this->assign('inputs', json_encode($input_array));
$this->assign('title', 'Account');
$this->start('form_object');
echo $this->Form->create($account);
$this->end();




