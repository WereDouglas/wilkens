<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tenant[]|\Cake\Collection\CollectionInterface $tenants
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tenant'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Penalties'), ['controller' => 'Penalties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Penalty'), ['controller' => 'Penalties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rents'), ['controller' => 'Rents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rent'), ['controller' => 'Rents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Securities'), ['controller' => 'Securities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Security'), ['controller' => 'Securities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tenants index large-9 medium-8 columns content">
    <h3><?= __('Tenants') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rent_start_due_day') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('notice') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount_to_pay') ?></th>
                <th scope="col"><?= $this->Paginator->sort('work_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('passport') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unit_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('property_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tenants as $tenant): ?>
            <tr>
                <td><?= h($tenant->id) ?></td>
                <td><?= h($tenant->start_date) ?></td>
                <td><?= h($tenant->end_date) ?></td>
                <td><?= h($tenant->rent_start_due_day) ?></td>
                <td><?= h($tenant->active) ?></td>
                <td><?= h($tenant->notice) ?></td>
                <td><?= h($tenant->amount_to_pay) ?></td>
                <td><?= h($tenant->work_address) ?></td>
                <td><?= h($tenant->nin) ?></td>
                <td><?= h($tenant->passport) ?></td>
                <td><?= h($tenant->created_at) ?></td>
                <td><?= $tenant->has('user') ? $this->Html->link($tenant->user->id, ['controller' => 'Users', 'action' => 'view', $tenant->user->id]) : '' ?></td>
                <td><?= h($tenant->unit_id) ?></td>
                <td><?= h($tenant->property_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tenant->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tenant->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tenant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tenant->id)]) ?>
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
