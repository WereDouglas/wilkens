<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Eviction[]|\Cake\Collection\CollectionInterface $evictions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Eviction'), ['action' => 'add']) ?></li>
           </ul>
</nav>
<div class="evictions index large-9 medium-8 columns content">
    <h3><?= __('Evictions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('balance') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('costs_incurred') ?></th>
                <th scope="col"><?= $this->Paginator->sort('repair_costs') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bill_costs') ?></th>
                <th scope="col"><?= $this->Paginator->sort('disposal_costs') ?></th>
                <th scope="col"><?= $this->Paginator->sort('evicted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('details') ?></th>
                <th scope="col"><?= $this->Paginator->sort('evicted_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('evicted_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reason') ?></th>
                <th scope="col"><?= $this->Paginator->sort('remarks') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tenant_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($evictions as $eviction): ?>
            <tr>
                <td><?= h($eviction->id) ?></td>
                <td><?= $this->Number->format($eviction->balance) ?></td>
                <td><?= h($eviction->date) ?></td>
                <td><?= $this->Number->format($eviction->costs_incurred) ?></td>
                <td><?= $this->Number->format($eviction->repair_costs) ?></td>
                <td><?= $this->Number->format($eviction->bill_costs) ?></td>
                <td><?= $this->Number->format($eviction->disposal_costs) ?></td>
                <td><?= h($eviction->evicted) ?></td>
                <td><?= h($eviction->details) ?></td>
                <td><?= h($eviction->evicted_on) ?></td>
                <td><?= h($eviction->evicted_by) ?></td>
                <td><?= h($eviction->reason) ?></td>
                <td><?= h($eviction->remarks) ?></td>
                <td><?= $eviction->has('tenant') ? $this->Html->link($eviction->tenant->id, ['controller' => 'Tenants', 'action' => 'view', $eviction->tenant->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $eviction->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eviction->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $eviction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eviction->id)]) ?>
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
