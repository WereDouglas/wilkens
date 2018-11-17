<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Unit $unit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Unit'), ['action' => 'edit', $unit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Unit'), ['action' => 'delete', $unit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $unit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="units view large-9 medium-8 columns content">
    <h3><?= h($unit->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($unit->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Types') ?></th>
            <td><?= h($unit->types) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($unit->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('States') ?></th>
            <td><?= h($unit->states) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Occupied') ?></th>
            <td><?= h($unit->occupied) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Property') ?></th>
            <td><?= $unit->has('property') ? $this->Html->link($unit->property->name, ['controller' => 'Properties', 'action' => 'view', $unit->property->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= h($unit->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cost') ?></th>
            <td><?= $this->Number->format($unit->cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rooms') ?></th>
            <td><?= $this->Number->format($unit->rooms) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($unit->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tenants') ?></h4>
        <?php if (!empty($unit->tenants)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Rent Start Due Day') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Notice') ?></th>
                <th scope="col"><?= __('Amount To Pay') ?></th>
                <th scope="col"><?= __('Work Address') ?></th>
                <th scope="col"><?= __('Nin') ?></th>
                <th scope="col"><?= __('Passport') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Unit Id') ?></th>
                <th scope="col"><?= __('Property Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($unit->tenants as $tenants): ?>
            <tr>
                <td><?= h($tenants->id) ?></td>
                <td><?= h($tenants->start_date) ?></td>
                <td><?= h($tenants->end_date) ?></td>
                <td><?= h($tenants->rent_start_due_day) ?></td>
                <td><?= h($tenants->active) ?></td>
                <td><?= h($tenants->notice) ?></td>
                <td><?= h($tenants->amount_to_pay) ?></td>
                <td><?= h($tenants->work_address) ?></td>
                <td><?= h($tenants->nin) ?></td>
                <td><?= h($tenants->passport) ?></td>
                <td><?= h($tenants->created_at) ?></td>
                <td><?= h($tenants->user_id) ?></td>
                <td><?= h($tenants->unit_id) ?></td>
                <td><?= h($tenants->property_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tenants', 'action' => 'view', $tenants->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tenants', 'action' => 'edit', $tenants->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tenants', 'action' => 'delete', $tenants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tenants->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
