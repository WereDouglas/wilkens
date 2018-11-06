<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Confiscation[]|\Cake\Collection\CollectionInterface $confiscations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Confiscation'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="confiscations index large-9 medium-8 columns content">
    <h3><?= __('Confiscations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('details') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cost') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sold') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sold_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sold_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('storage_fees') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deadline') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tenant_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($confiscations as $confiscation): ?>
            <tr>
                <td><?= h($confiscation->id) ?></td>
                <td><?= h($confiscation->date) ?></td>
                <td><?= h($confiscation->details) ?></td>
                <td><?= $this->Number->format($confiscation->cost) ?></td>
                <td><?= h($confiscation->sold) ?></td>
                <td><?= h($confiscation->sold_on) ?></td>
                <td><?= h($confiscation->sold_by) ?></td>
                <td><?= $this->Number->format($confiscation->storage_fees) ?></td>
                <td><?= h($confiscation->deadline) ?></td>
                <td><?= h($confiscation->created_at) ?></td>
                <td><?= $confiscation->has('tenant') ? $this->Html->link($confiscation->tenant->id, ['controller' => 'Tenants', 'action' => 'view', $confiscation->tenant->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $confiscation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $confiscation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $confiscation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $confiscation->id)]) ?>
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
