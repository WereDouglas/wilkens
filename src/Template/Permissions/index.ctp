<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permission[]|\Cake\Collection\CollectionInterface $permissions
 */
$links_array = [
    ['New Permission',  ['action' => 'add']],
    ['List Roles',['controller' => 'Roles', 'action' => 'index']],
    ['New Role',['controller' => 'Roles', 'action' => 'add']]
    ];
$headers = new \Cake\Collection\Collection(['id', 'description']);

$objects = $permissions->map(function ($permission) use ($headers) {
    return $headers->map(function ($header) use ($permission) {
        return $permission->get($header);
    });
});

$this->extend('/Common/table');
$this->assign('links', json_encode($links_array));
$this->assign('page_header', "Permissions");

$this->set(compact('headers', 'objects'));







