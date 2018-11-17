<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Deposit[]|\Cake\Collection\CollectionInterface $deposits
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Deposit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deposits index large-9 medium-8 columns content">
    <h3><?= __('Deposits') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rent_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expense_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('method') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prepared_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deposited_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('complete') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('account_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('account_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('account_name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deposits as $deposit): ?>
            <tr>
                <td><?= h($deposit->id) ?></td>
                <td><?= $this->Number->format($deposit->total_amount) ?></td>
                <td><?= $this->Number->format($deposit->rent_amount) ?></td>
                <td><?= $this->Number->format($deposit->expense_amount) ?></td>
                <td><?= h($deposit->method) ?></td>
                <td><?= h($deposit->date) ?></td>
                <td><?= h($deposit->prepared_id) ?></td>
                <td><?= h($deposit->approved_id) ?></td>
                <td><?= h($deposit->deposited_id) ?></td>
                <td><?= h($deposit->complete) ?></td>
                <td><?= h($deposit->created_at) ?></td>
                <td><?= $deposit->has('account') ? $this->Html->link($deposit->account->id, ['controller' => 'Accounts', 'action' => 'view', $deposit->account->id]) : '' ?></td>
                <td><?= $deposit->has('user') ? $this->Html->link($deposit->user->id, ['controller' => 'Users', 'action' => 'view', $deposit->user->id]) : '' ?></td>
                <td><?= h($deposit->account_no) ?></td>
                <td><?= h($deposit->account_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $deposit->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deposit->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deposit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deposit->id)]) ?>
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
