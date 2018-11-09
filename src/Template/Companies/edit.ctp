<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */

$links_array = [
    ['List Companies', ['action' => 'index']]
];

$input_array = [
    ['name', ['class' => 'form-control']],
    ['address', ['class' => 'form-control']],
    ['photo', ['type' => 'file']]
];

$this->extend('/Common/edit');
$this->assign('links', json_encode($links_array));
$this->assign('inputs', json_encode($input_array));
$this->assign('id',$ids);

$this->start('form_object');
echo $this->Form->create($company, ['type' =>'file']);
$this->end();
