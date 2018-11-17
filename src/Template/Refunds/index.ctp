<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Refund[]|\Cake\Collection\CollectionInterface $refunds
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Refund'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="refunds index large-9 medium-8 columns content">
    <h3><?= __('Refunds') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bills') ?></th>
                <th scope="col"><?= $this->Paginator->sort('damages') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rent_due') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount_refundable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('paid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($refunds as $refund): ?>
            <tr>
                <td><?= h($refund->id) ?></td>
                <td><?= $this->Number->format($refund->amount) ?></td>
                <td><?= $this->Number->format($refund->bills) ?></td>
                <td><?= $this->Number->format($refund->damages) ?></td>
                <td><?= $this->Number->format($refund->rent_due) ?></td>
                <td><?= $this->Number->format($refund->amount_refundable) ?></td>
                <td><?= h($refund->date) ?></td>
                <td><?= h($refund->paid) ?></td>
                <td><?= h($refund->approved) ?></td>
                <td><?= h($refund->approved_id) ?></td>
                <td><?= h($refund->created_at) ?></td>
                <td><?= $refund->has('user') ? $this->Html->link($refund->user->id, ['controller' => 'Users', 'action' => 'view', $refund->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $refund->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $refund->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $refund->id], ['confirm' => __('Are you sure you want to delete # {0}?', $refund->id)]) ?>
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
