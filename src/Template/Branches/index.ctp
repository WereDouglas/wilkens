<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Branch[]|\Cake\Collection\CollectionInterface $branches
 */




$links_array = [
    ['New Branch', ['action' => 'add']]];

$headers = ['id', 'name','company_name'];
// $branch->has('company') ? $this->Html->link($branch->company->name, ['controller' => 'Companies', 'action' => 'view', $branch->company->id]) : ''
$objects = $branches->map(function ($branch) use ($headers) {
    return $branch->extract($headers);
});

$this->extend('/Common/table');
$this->assign('links', json_encode($links_array));
$this->assign('page_header', "Branches");
$this->set(compact('headers', 'objects'));
