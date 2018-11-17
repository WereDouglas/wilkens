<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $installment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Installment'), ['action' => 'edit', $installment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Installment'), ['action' => 'delete', $installment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $installment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Installments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Installment'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="installments view large-9 medium-8 columns content">
    <h3><?= h($installment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($installment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= h($installment->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paid') ?></th>
            <td><?= h($installment->paid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Received Id') ?></th>
            <td><?= h($installment->received_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Method') ?></th>
            <td><?= h($installment->method) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($installment->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No') ?></th>
            <td><?= $this->Number->format($installment->no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Balance') ?></th>
            <td><?= $this->Number->format($installment->balance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($installment->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deadline') ?></th>
            <td><?= h($installment->deadline) ?></td>
        </tr>
    </table>
</div>
