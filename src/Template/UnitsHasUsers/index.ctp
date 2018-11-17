<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UnitsHasUser[]|\Cake\Collection\CollectionInterface $unitsHasUsers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Units Has User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="unitsHasUsers index large-9 medium-8 columns content">
    <h3><?= __('Units Has Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('units_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($unitsHasUsers as $unitsHasUser): ?>
            <tr>
                <td><?= $unitsHasUser->has('unit') ? $this->Html->link($unitsHasUser->unit->name, ['controller' => 'Units', 'action' => 'view', $unitsHasUser->unit->id]) : '' ?></td>
                <td><?= $unitsHasUser->has('user') ? $this->Html->link($unitsHasUser->user->id, ['controller' => 'Users', 'action' => 'view', $unitsHasUser->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $unitsHasUser->units_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $unitsHasUser->units_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $unitsHasUser->units_id], ['confirm' => __('Are you sure you want to delete # {0}?', $unitsHasUser->units_id)]) ?>
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
