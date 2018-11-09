<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bill $bill
 */



$links_array = [
    ['List Bills', ['action' => 'index']],

];
$active =['yes','no'];

$input_array = [
    ['created_on', ['class' => 'form-control', 'placeholder' => 'Created on']],
    ['due_date', ['class' => 'form-control', 'placeholder' => 'Due date']],
    ['previous_reading', ['class' => 'form-control', 'placeholder' => 'Previous reading']],
    ['current_reading', ['class' => 'form-control', 'placeholder' => 'Current reading']],
    ['units_used', ['class' => 'form-control', 'placeholder' => 'Units used']],
    ['unit_cost', ['class' => 'form-control', 'placeholder' => 'Cost']],
    ['total_cost', ['options' => $active]],
    ['created_by', ['class' => 'form-control']],
    ['paid', ['options' => $active]],
    ['created_at', ['class' => 'form-control']],
    ['utility_id', ['options' => $utilities]]
];

$this->extend('/Common/add');
$this->assign('links', json_encode($links_array));
$this->assign('inputs', json_encode($input_array));

$this->start('form_object');
echo $this->Form->create($bill);
$this->end();

