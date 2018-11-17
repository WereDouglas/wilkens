<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Security $security
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Security'), ['action' => 'edit', $security->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Security'), ['action' => 'delete', $security->id], ['confirm' => __('Are you sure you want to delete # {0}?', $security->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Securities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Security'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="securities view large-9 medium-8 columns content">
    <h3><?= h($security->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($security->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Method') ?></th>
            <td><?= h($security->method) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paid Back') ?></th>
            <td><?= h($security->paid_back) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved') ?></th>
            <td><?= h($security->approved) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requested Id') ?></th>
            <td><?= h($security->requested_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $security->has('user') ? $this->Html->link($security->user->id, ['controller' => 'Users', 'action' => 'view', $security->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= h($security->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($security->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Refunded') ?></th>
            <td><?= $this->Number->format($security->refunded) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No') ?></th>
            <td><?= $this->Number->format($security->no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($security->date) ?></td>
        </tr>
    </table>
</div>
