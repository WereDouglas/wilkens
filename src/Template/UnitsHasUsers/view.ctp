<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UnitsHasUser $unitsHasUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Units Has User'), ['action' => 'edit', $unitsHasUser->units_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Units Has User'), ['action' => 'delete', $unitsHasUser->units_id], ['confirm' => __('Are you sure you want to delete # {0}?', $unitsHasUser->units_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Units Has Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Units Has User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="unitsHasUsers view large-9 medium-8 columns content">
    <h3><?= h($unitsHasUser->units_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Unit') ?></th>
            <td><?= $unitsHasUser->has('unit') ? $this->Html->link($unitsHasUser->unit->name, ['controller' => 'Units', 'action' => 'view', $unitsHasUser->unit->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $unitsHasUser->has('user') ? $this->Html->link($unitsHasUser->user->id, ['controller' => 'Users', 'action' => 'view', $unitsHasUser->user->id]) : '' ?></td>
        </tr>
    </table>
</div>
