<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Penalty $penalty
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Penalties'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="penalties form large-9 medium-8 columns content">
    <?= $this->Form->create($penalty) ?>
    <fieldset>
        <legend><?= __('Add Penalty') ?></legend>
        <?php
            echo $this->Form->control('total');
            echo $this->Form->control('user_id');
            echo $this->Form->control('rent_id');
            echo $this->Form->control('created_at');
            echo $this->Form->control('paid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
