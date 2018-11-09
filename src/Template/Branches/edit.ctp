<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Branch $branch
 */



$links_array = [
    ['List Branches', ['action' => 'index']],

];

$input_array = [
    ['name', ['class' => 'form-control']],
    ['company_id', ['options' => $companies]]
];
$this->extend('/Common/edit');
$this->assign('links', json_encode($links_array));
$this->assign('inputs', json_encode($input_array));

$this->start('form_object');
echo $this->Form->create($branch);
$this->end();


