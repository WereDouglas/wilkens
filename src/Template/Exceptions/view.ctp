<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exception $exception
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Exception'), ['action' => 'edit', $exception->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Exception'), ['action' => 'delete', $exception->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exception->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Exceptions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exception'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="exceptions view large-9 medium-8 columns content">
    <h3><?= h($exception->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Message') ?></th>
            <td><?= h($exception->message) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Process') ?></th>
            <td><?= h($exception->process) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($exception->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($exception->created_at) ?></td>
        </tr>
    </table>
</div>
