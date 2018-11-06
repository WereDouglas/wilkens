<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Penalty $penalty
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Penalty'), ['action' => 'edit', $penalty->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Penalty'), ['action' => 'delete', $penalty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $penalty->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Penalties'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Penalty'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="penalties view large-9 medium-8 columns content">
    <h3><?= h($penalty->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($penalty->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paid By') ?></th>
            <td><?= h($penalty->paid_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tenant') ?></th>
            <td><?= $penalty->has('tenant') ? $this->Html->link($penalty->tenant->id, ['controller' => 'Tenants', 'action' => 'view', $penalty->tenant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td><?= $this->Number->format($penalty->total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($penalty->created_at) ?></td>
        </tr>
    </table>
</div>
