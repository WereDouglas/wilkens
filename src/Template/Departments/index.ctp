<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Department[]|\Cake\Collection\CollectionInterface $departments
 */
$links_array = [
    ['New Department', ['action' => 'add']],
];

$headers = ['id', 'name', 'company_name'];

$objects = $departments->map(function ($department) use ($headers) {
    return $department->extract($headers);
});

$this->extend('/Common/table');
$this->assign('links', json_encode($links_array));

$this->assign('page_header', "Departments");

$this->set(compact('headers', 'objects'));
