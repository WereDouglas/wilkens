<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tenant $tenant
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tenant->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tenant->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tenants'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Penalties'), ['controller' => 'Penalties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Penalty'), ['controller' => 'Penalties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rents'), ['controller' => 'Rents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rent'), ['controller' => 'Rents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Securities'), ['controller' => 'Securities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Security'), ['controller' => 'Securities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tenants form large-9 medium-8 columns content">
    <?= $this->Form->create($tenant) ?>
    <fieldset>
        <legend><?= __('Edit Tenant') ?></legend>
        <?php
            echo $this->Form->control('start_date');
            echo $this->Form->control('end_date');
            echo $this->Form->control('rent_start_due_day');
            echo $this->Form->control('active');
            echo $this->Form->control('notice');
            echo $this->Form->control('amount_to_pay');
            echo $this->Form->control('work_address');
            echo $this->Form->control('nin');
            echo $this->Form->control('passport');
            echo $this->Form->control('created_at');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('unit_id');
            echo $this->Form->control('property_id');
            echo $this->Form->control('units._ids', ['options' => $units]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
