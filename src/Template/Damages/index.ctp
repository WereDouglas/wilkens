<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Damage[]|\Cake\Collection\CollectionInterface $damages
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Damage'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="damages index large-9 medium-8 columns content">
    <h3><?= __('Damages') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('details') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prepared_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('paid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('repaired') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_repaired') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tenant_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($damages as $damage): ?>
            <tr>
                <td><?= h($damage->id) ?></td>
                <td><?= h($damage->details) ?></td>
                <td><?= $this->Number->format($damage->amount) ?></td>
                <td><?= h($damage->date) ?></td>
                <td><?= h($damage->prepared_by) ?></td>
                <td><?= h($damage->paid) ?></td>
                <td><?= h($damage->repaired) ?></td>
                <td><?= h($damage->date_repaired) ?></td>
                <td><?= h($damage->created_at) ?></td>
                <td><?= $damage->has('tenant') ? $this->Html->link($damage->tenant->id, ['controller' => 'Tenants', 'action' => 'view', $damage->tenant->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $damage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $damage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $damage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $damage->id)]) ?>
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
