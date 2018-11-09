<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */

$links_array = [
    ['New User', ['action' => 'add']]];

//$headers = new \Cake\Collection\Collection(['id', 'first_name', 'last_name', 'contact', 'email', 'photo', 'address', 'active', 'created_at', 'photo_dir']);
$headers = ['id', 'first_name', 'last_name', 'contact', 'email', 'photo', 'address', 'active', 'created_at', 'photo_dir','company_id','full_name'];

$objects = $users->map(function ($user) use ($headers) {
    return $user->extract($headers);
});

$this->extend('/Common/table');
$this->assign('links', json_encode($links_array));

$this->assign('page_header', "Users");

$this->set(compact('headers', 'objects'));
