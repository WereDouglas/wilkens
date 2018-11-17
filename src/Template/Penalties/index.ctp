<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Penalty[]|\Cake\Collection\CollectionInterface $penalties
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Penalty'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="penalties index large-9 medium-8 columns content">
    <h3><?= __('Penalties') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rent_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('paid') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($penalties as $penalty): ?>
            <tr>
                <td><?= h($penalty->id) ?></td>
                <td><?= $this->Number->format($penalty->total) ?></td>
                <td><?= h($penalty->user_id) ?></td>
                <td><?= h($penalty->rent_id) ?></td>
                <td><?= h($penalty->created_at) ?></td>
                <td><?= h($penalty->paid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $penalty->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $penalty->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $penalty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $penalty->id)]) ?>
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
