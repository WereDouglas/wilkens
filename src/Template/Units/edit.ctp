<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Unit $unit
 */


$links_array = [
    ['List Units', ['action' => 'index']],
    ['List Properties', ['controller' => 'Properties', 'action' => 'index']],
    ['New Property', ['controller' => 'Properties', 'action' => 'add']],
    ['List Tenants', ['controller' => 'Tenants', 'action' => 'index']],
    ['New Tenant', ['controller' => 'Tenants', 'action' => 'add']]

];
$active =['yes','no'];
$state =['Occupied','Vacant'];
$type =['Single room','House','Office'];
$input_array = [
    ['type', ['options' => $type]],
    ['name', ['class' => 'form-control', 'placeholder' => 'Name']],
    ['state', ['options' => $state]],
    ['occupied', ['options' => $active]],
    ['cost', ['class' => 'form-control', 'placeholder' => 'Cost']],
    ['description', ['class' => 'form-control', 'placeholder' => 'Details']],
    ['rooms', ['class' => 'form-control', 'placeholder' => 'No of rooms']],
    ['property_id', ['options' => $properties]],
    ['tenants._ids', ['options' => $tenants]],

];

$this->extend('/Common/edit');
$this->assign('links', json_encode($links_array));
$this->assign('inputs', json_encode($input_array));
$this->assign('title', 'Room/Unit');
$this->start('form_object');
echo $this->Form->create($unit, ['type' =>'file']);
$this->end();

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $unit->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $unit->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Units'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="units form large-9 medium-8 columns content">
    <?= $this->Form->create($unit) ?>
    <fieldset>
        <legend><?= __('Edit Unit') ?></legend>
        <?php
            echo $this->Form->control('type');
            echo $this->Form->control('name');
            echo $this->Form->control('state');
            echo $this->Form->control('occupied');
            echo $this->Form->control('cost');
            echo $this->Form->control('description');
            echo $this->Form->control('rooms');
            echo $this->Form->control('property_id', ['options' => $properties]);
            echo $this->Form->control('tenants._ids', ['options' => $tenants]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
