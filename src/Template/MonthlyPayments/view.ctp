<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MonthlyPayment $monthlyPayment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Monthly Payment'), ['action' => 'edit', $monthlyPayment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Monthly Payment'), ['action' => 'delete', $monthlyPayment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $monthlyPayment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Monthly Payments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Monthly Payment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rents'), ['controller' => 'Rents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rent'), ['controller' => 'Rents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="monthlyPayments view large-9 medium-8 columns content">
    <h3><?= h($monthlyPayment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($monthlyPayment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Month') ?></th>
            <td><?= h($monthlyPayment->month) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= h($monthlyPayment->year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rent') ?></th>
            <td><?= $monthlyPayment->has('rent') ? $this->Html->link($monthlyPayment->rent->id, ['controller' => 'Rents', 'action' => 'view', $monthlyPayment->rent->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $monthlyPayment->has('user') ? $this->Html->link($monthlyPayment->user->id, ['controller' => 'Users', 'action' => 'view', $monthlyPayment->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Amount') ?></th>
            <td><?= $this->Number->format($monthlyPayment->total_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('To Client') ?></th>
            <td><?= $this->Number->format($monthlyPayment->to_client) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('For Commission') ?></th>
            <td><?= $this->Number->format($monthlyPayment->for_commission) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($monthlyPayment->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($monthlyPayment->created_at) ?></td>
        </tr>
    </table>
</div>
