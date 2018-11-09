<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tenant[]|\Cake\Collection\CollectionInterface $tenants
 */


$links_array = [
    ['Add Tenant',['controller' => 'Tenants', 'action' => 'add']]];

$headers = new \Cake\Collection\Collection(['id', 'start_date', 'end_date', 'rent_start_due_day', 'active', 'notice', 'amount_to_pay','work_address','nin','passport','created_at','user_id','client_id']);
//$tenant->has('user') ? $this->Html->link($tenant->user->id, ['controller' => 'Users', 'action' => 'view', $tenant->user->id]) : ''
$objects = $tenants->map(function ($tenant) use ($headers) {
    return $headers->map(function ($header) use ($tenant) {
        return $tenant->get($header);
    });
});

$this->extend('/Common/table');
$this->assign('links', json_encode($links_array));
$this->assign('page_header', "Accounts");
$this->set(compact('headers', 'objects'));


