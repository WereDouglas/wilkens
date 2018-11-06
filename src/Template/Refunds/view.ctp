<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Refund $refund
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Refund'), ['action' => 'edit', $refund->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Refund'), ['action' => 'delete', $refund->id], ['confirm' => __('Are you sure you want to delete # {0}?', $refund->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Refunds'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Refund'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="refunds view large-9 medium-8 columns content">
    <h3><?= h($refund->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($refund->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paid') ?></th>
            <td><?= h($refund->paid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved') ?></th>
            <td><?= h($refund->approved) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved By') ?></th>
            <td><?= h($refund->approved_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tenant') ?></th>
            <td><?= $refund->has('tenant') ? $this->Html->link($refund->tenant->id, ['controller' => 'Tenants', 'action' => 'view', $refund->tenant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($refund->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bills') ?></th>
            <td><?= $this->Number->format($refund->bills) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Damages') ?></th>
            <td><?= $this->Number->format($refund->damages) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rent Due') ?></th>
            <td><?= $this->Number->format($refund->rent_due) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount Refundable') ?></th>
            <td><?= $this->Number->format($refund->amount_refundable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($refund->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($refund->created_at) ?></td>
        </tr>
    </table>
</div>
