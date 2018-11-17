<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Utility $utility
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Utility'), ['action' => 'edit', $utility->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Utility'), ['action' => 'delete', $utility->id], ['confirm' => __('Are you sure you want to delete # {0}?', $utility->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Utilities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Utility'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="utilities view large-9 medium-8 columns content">
    <h3><?= h($utility->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($utility->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($utility->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Starting Reading') ?></th>
            <td><?= h($utility->starting_reading) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account No') ?></th>
            <td><?= h($utility->account_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $utility->has('user') ? $this->Html->link($utility->user->id, ['controller' => 'Users', 'action' => 'view', $utility->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unit Cost') ?></th>
            <td><?= $this->Number->format($utility->unit_cost) ?></td>
        </tr>
    </table>
</div>
