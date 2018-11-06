<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Password $password
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Password'), ['action' => 'edit', $password->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Password'), ['action' => 'delete', $password->id], ['confirm' => __('Are you sure you want to delete # {0}?', $password->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Passwords'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Password'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="passwords view large-9 medium-8 columns content">
    <h3><?= h($password->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($password->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($password->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $password->has('user') ? $this->Html->link($password->user->id, ['controller' => 'Users', 'action' => 'view', $password->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($password->created_at) ?></td>
        </tr>
    </table>
</div>
