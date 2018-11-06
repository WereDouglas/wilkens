<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Damage $damage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Damage'), ['action' => 'edit', $damage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Damage'), ['action' => 'delete', $damage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $damage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Damages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Damage'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="damages view large-9 medium-8 columns content">
    <h3><?= h($damage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($damage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Details') ?></th>
            <td><?= h($damage->details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prepared By') ?></th>
            <td><?= h($damage->prepared_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paid') ?></th>
            <td><?= h($damage->paid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Repaired') ?></th>
            <td><?= h($damage->repaired) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tenant') ?></th>
            <td><?= $damage->has('tenant') ? $this->Html->link($damage->tenant->id, ['controller' => 'Tenants', 'action' => 'view', $damage->tenant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($damage->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($damage->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Repaired') ?></th>
            <td><?= h($damage->date_repaired) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($damage->created_at) ?></td>
        </tr>
    </table>
</div>
