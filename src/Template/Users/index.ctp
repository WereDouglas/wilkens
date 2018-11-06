<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */

$links_array = [
    ['New User', ['action' => 'add']]];

$headers = new \Cake\Collection\Collection(['id', 'first_name', 'last_name', 'contact', 'email', 'photo', 'address', 'active', 'created_at','photo_dir']);
/*
 $objects = [];
foreach ($users as $user) {
    $object = [];
    foreach ($headers as $header) {
        array_push($object, $user->get($header));
   }
   array_push($objects, $object);
}

$headers = ['id', 'first_name', 'last_name', 'contact', 'email', 'photo', 'address', 'active', 'created_at'];
$objects = array_map(function ($user) use ($headers) {
    return array_map(function ($header) use ($user) {
        return $user->get($header);
    }, $headers);
}, $users->toArray());

*/
$objects = $users->map(function ($user) use ($headers) {
    return $headers->map(function ($header) use ($user) {
        return $user->get($header);
    });
});


$this->extend('/Common/table');
$this->assign('links', json_encode($links_array));

$this->assign('page_header', "Users");

$this->set(compact('headers', 'objects'));
