<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bill $bill
 */


$links_array = [
    ['List Bills', ['action' => 'index']],

];

$active = ['yes','no'];

$input_array = [
    ['created_on', ['class' => 'form-control', ]],
    ['due_date', ['class' => 'form-control',  'empty' => true]],
    ['previous_reading', ['class' => 'form-control']],
    ['current_reading', ['class' => 'form-control']],
    ['units_used', ['class' => 'form-control']],
    ['unit_cost', ['class' => 'form-control']],
    ['total_cost', ['options' => $active, 'empty' => false]],
    ['created_by', ['class' => 'form-control']],
    ['paid', ['options' => $active]],
    ['created_at', ['class' => 'form-control']],
    ['utility_id', ['options' => $utilities]]
];

$this->extend('/Common/edit');
$this->assign('links', json_encode($links_array));
$this->assign('inputs', json_encode($input_array));
$this->assign('id',$ids);

$this->start('form_object');
echo $this->Form->create($bill);
$this->end();


?>
