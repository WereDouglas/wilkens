<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Utility[]|\Cake\Collection\CollectionInterface $utilities
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Utility'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="utilities index large-9 medium-8 columns content">
    <h3><?= __('Utilities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('starting_reading') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unit_cost') ?></th>
                <th scope="col"><?= $this->Paginator->sort('account_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($utilities as $utility): ?>
            <tr>
                <td><?= h($utility->id) ?></td>
                <td><?= h($utility->name) ?></td>
                <td><?= h($utility->starting_reading) ?></td>
                <td><?= $this->Number->format($utility->unit_cost) ?></td>
                <td><?= h($utility->account_no) ?></td>
                <td><?= $utility->has('user') ? $this->Html->link($utility->user->id, ['controller' => 'Users', 'action' => 'view', $utility->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $utility->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $utility->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $utility->id], ['confirm' => __('Are you sure you want to delete # {0}?', $utility->id)]) ?>
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
