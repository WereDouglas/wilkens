<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exception[]|\Cake\Collection\CollectionInterface $exceptions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Exception'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="exceptions index large-9 medium-8 columns content">
    <h3><?= __('Exceptions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('message') ?></th>
                <th scope="col"><?= $this->Paginator->sort('process') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($exceptions as $exception): ?>
            <tr>
                <td><?= $this->Number->format($exception->id) ?></td>
                <td><?= h($exception->message) ?></td>
                <td><?= h($exception->process) ?></td>
                <td><?= h($exception->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $exception->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $exception->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $exception->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exception->id)]) ?>
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
