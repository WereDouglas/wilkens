<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company[]|\Cake\Collection\CollectionInterface $companies
 */



$links_array = [
    ['New Company', ['action' => 'add']]];

$headers =  ['id','name','address','photo','photo_dir'];


$objects = $companies->map(function ($company) use ($headers) {
    return $company->extract($headers);
});

$this->extend('/Common/table');
$this->assign('links', json_encode($links_array));
$this->assign('page_header', "Companies");
$this->set(compact('headers', 'objects'));
