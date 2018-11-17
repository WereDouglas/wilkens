<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TenantsUnit $tenantsUnit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tenants Unit'), ['action' => 'edit', $tenantsUnit->unit_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tenants Unit'), ['action' => 'delete', $tenantsUnit->unit_id], ['confirm' => __('Are you sure you want to delete # {0}?', $tenantsUnit->unit_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tenants Units'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tenants Unit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tenantsUnits view large-9 medium-8 columns content">
    <h3><?= h($tenantsUnit->unit_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Unit') ?></th>
            <td><?= $tenantsUnit->has('unit') ? $this->Html->link($tenantsUnit->unit->name, ['controller' => 'Units', 'action' => 'view', $tenantsUnit->unit->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $tenantsUnit->has('user') ? $this->Html->link($tenantsUnit->user->id, ['controller' => 'Users', 'action' => 'view', $tenantsUnit->user->id]) : '' ?></td>
        </tr>
    </table>
</div>
