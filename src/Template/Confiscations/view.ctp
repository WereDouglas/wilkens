<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Confiscation $confiscation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Confiscation'), ['action' => 'edit', $confiscation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Confiscation'), ['action' => 'delete', $confiscation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $confiscation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Confiscations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Confiscation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="confiscations view large-9 medium-8 columns content">
    <h3><?= h($confiscation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($confiscation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Details') ?></th>
            <td><?= h($confiscation->details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sold') ?></th>
            <td><?= h($confiscation->sold) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sold Id') ?></th>
            <td><?= h($confiscation->sold_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $confiscation->has('user') ? $this->Html->link($confiscation->user->id, ['controller' => 'Users', 'action' => 'view', $confiscation->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cost') ?></th>
            <td><?= $this->Number->format($confiscation->cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Storage Fees') ?></th>
            <td><?= $this->Number->format($confiscation->storage_fees) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($confiscation->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sold On') ?></th>
            <td><?= h($confiscation->sold_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deadline') ?></th>
            <td><?= h($confiscation->deadline) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($confiscation->created_at) ?></td>
        </tr>
    </table>
</div>
