<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bill[]|\Cake\Collection\CollectionInterface $bills
 */



$links_array = [
    ['New Bill', ['action' => 'add']]];

$headers = new \Cake\Collection\Collection(['id', 'created_on', 'due_date', 'previous_date', 'current_reading', 'units_used', 'unit_cost','total_cost','created_by','paid','created_at','utility_id']);

// $bill->has('utility') ? $this->Html->link($bill->utility->name, ['controller' => 'Utilities', 'action' => 'view', $bill->utility->id]) :
$objects = $bills->map(function ($bill) use ($headers) {
    return $headers->map(function ($header) use ($bill) {
        return $bill->get($header);
    });
});


$this->extend('/Common/table');
$this->assign('links', json_encode($links_array));
$this->assign('page_header', "Accounts");

$this->set(compact('headers', 'objects'));

?>
