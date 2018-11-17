<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kin $kin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Kin'), ['action' => 'edit', $kin->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Kin'), ['action' => 'delete', $kin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $kin->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Kins'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Kin'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="kins view large-9 medium-8 columns content">
    <h3><?= h($kin->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($kin->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($kin->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= h($kin->contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($kin->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $kin->has('user') ? $this->Html->link($kin->user->id, ['controller' => 'Users', 'action' => 'view', $kin->user->id]) : '' ?></td>
        </tr>
    </table>
</div>
