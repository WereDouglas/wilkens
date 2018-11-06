<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bill[]|\Cake\Collection\CollectionInterface $bills
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bill'), ['action' => 'add']) ?></li>
           </ul>
</nav>
<div class="bills index large-9 medium-8 columns content">
    <h3><?= __('Bills') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('due_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('previous_reading') ?></th>
                <th scope="col"><?= $this->Paginator->sort('current_reading') ?></th>
                <th scope="col"><?= $this->Paginator->sort('units_used') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unit_cost') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_cost') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('paid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('utility_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bills as $bill): ?>
            <tr>
                <td><?= h($bill->id) ?></td>
                <td><?= h($bill->created_on) ?></td>
                <td><?= h($bill->due_date) ?></td>
                <td><?= h($bill->previous_reading) ?></td>
                <td><?= h($bill->current_reading) ?></td>
                <td><?= h($bill->units_used) ?></td>
                <td><?= $this->Number->format($bill->unit_cost) ?></td>
                <td><?= $this->Number->format($bill->total_cost) ?></td>
                <td><?= h($bill->created_by) ?></td>
                <td><?= h($bill->paid) ?></td>
                <td><?= h($bill->created_at) ?></td>
                <td><?= $bill->has('utility') ? $this->Html->link($bill->utility->name, ['controller' => 'Utilities', 'action' => 'view', $bill->utility->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bill->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bill->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bill->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bill->id)]) ?>
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
