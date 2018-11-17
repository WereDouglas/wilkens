<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Security[]|\Cake\Collection\CollectionInterface $securities
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Security'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="securities index large-9 medium-8 columns content">
    <h3><?= __('Securities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('method') ?></th>
                <th scope="col"><?= $this->Paginator->sort('paid_back') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requested_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('refunded') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($securities as $security): ?>
            <tr>
                <td><?= h($security->id) ?></td>
                <td><?= h($security->date) ?></td>
                <td><?= $this->Number->format($security->amount) ?></td>
                <td><?= h($security->method) ?></td>
                <td><?= h($security->paid_back) ?></td>
                <td><?= h($security->approved) ?></td>
                <td><?= h($security->requested_id) ?></td>
                <td><?= $security->has('user') ? $this->Html->link($security->user->id, ['controller' => 'Users', 'action' => 'view', $security->user->id]) : '' ?></td>
                <td><?= $this->Number->format($security->refunded) ?></td>
                <td><?= $this->Number->format($security->no) ?></td>
                <td><?= h($security->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $security->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $security->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $security->id], ['confirm' => __('Are you sure you want to delete # {0}?', $security->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
