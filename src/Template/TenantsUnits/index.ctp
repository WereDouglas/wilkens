<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TenantsUnit[]|\Cake\Collection\CollectionInterface $tenantsUnits
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tenants Unit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tenantsUnits index large-9 medium-8 columns content">
    <h3><?= __('Tenants Units') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('unit_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tenantsUnits as $tenantsUnit): ?>
            <tr>
                <td><?= $tenantsUnit->has('unit') ? $this->Html->link($tenantsUnit->unit->name, ['controller' => 'Units', 'action' => 'view', $tenantsUnit->unit->id]) : '' ?></td>
                <td><?= $tenantsUnit->has('user') ? $this->Html->link($tenantsUnit->user->id, ['controller' => 'Users', 'action' => 'view', $tenantsUnit->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tenantsUnit->unit_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tenantsUnit->unit_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tenantsUnit->unit_id], ['confirm' => __('Are you sure you want to delete # {0}?', $tenantsUnit->unit_id)]) ?>
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
