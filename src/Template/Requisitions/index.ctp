<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requisition[]|\Cake\Collection\CollectionInterface $requisitions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Requisition'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Expenses'), ['controller' => 'Expenses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Expense'), ['controller' => 'Expenses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requisitions index large-9 medium-8 columns content">
    <h3><?= __('Requisitions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('paid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('paid_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('method') ?></th>
                <th scope="col"><?= $this->Paginator->sort('repaired') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requested_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('property_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unit_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requisitions as $requisition): ?>
            <tr>
                <td><?= h($requisition->id) ?></td>
                <td><?= h($requisition->type) ?></td>
                <td><?= h($requisition->date) ?></td>
                <td><?= h($requisition->no) ?></td>
                <td><?= h($requisition->approved) ?></td>
                <td><?= h($requisition->approved_id) ?></td>
                <td><?= h($requisition->paid) ?></td>
                <td><?= h($requisition->paid_id) ?></td>
                <td><?= h($requisition->method) ?></td>
                <td><?= h($requisition->repaired) ?></td>
                <td><?= h($requisition->requested_id) ?></td>
                <td><?= h($requisition->category) ?></td>
                <td><?= h($requisition->created_at) ?></td>
                <td><?= $requisition->has('user') ? $this->Html->link($requisition->user->id, ['controller' => 'Users', 'action' => 'view', $requisition->user->id]) : '' ?></td>
                <td><?= h($requisition->property_id) ?></td>
                <td><?= h($requisition->unit_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requisition->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requisition->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requisition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requisition->id)]) ?>
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
