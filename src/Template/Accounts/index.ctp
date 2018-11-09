<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Account[]|\Cake\Collection\CollectionInterface $accounts
 */

$links_array = [
    ['New Account', ['action' => 'add']]];

$headers = new \Cake\Collection\Collection(['id', 'no', 'type', 'contact', 'account_name', 'bank_name', 'user_id']);

$objects = $accounts->map(function ($account) use ($headers) {
    return $account->extract($headers);
});

$this->extend('/Common/table');
$this->assign('links', json_encode($links_array));
$this->assign('page_header', "Accounts");
$this->set(compact('headers', 'objects'));
