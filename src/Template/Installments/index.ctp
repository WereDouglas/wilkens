<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $installments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Installment'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="installments index large-9 medium-8 columns content">
    <h3><?= __('Installments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('paid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('received_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('method') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deadline') ?></th>
                <th scope="col"><?= $this->Paginator->sort('balance') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($installments as $installment): ?>
            <tr>
                <td><?= h($installment->id) ?></td>
                <td><?= h($installment->user_id) ?></td>
                <td><?= $this->Number->format($installment->amount) ?></td>
                <td><?= h($installment->paid) ?></td>
                <td><?= $this->Number->format($installment->no) ?></td>
                <td><?= h($installment->date) ?></td>
                <td><?= h($installment->received_id) ?></td>
                <td><?= h($installment->method) ?></td>
                <td><?= h($installment->deadline) ?></td>
                <td><?= $this->Number->format($installment->balance) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $installment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $installment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $installment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $installment->id)]) ?>
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
