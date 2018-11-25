<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tenant $tenant
 */
$links_array = [
    ['List Tenants', ['action' => 'index']],
    ['Add Tenant', ['action' => 'add']],
    ['New Users', ['controller' => 'Users', 'action' => 'view']],
    ['List Units', ['controller' => 'Units', 'action' => 'index']]
];
?>

<div class="tenants view large-9 medium-8 columns content">
    <?= $this->Element('nav', ['links' => $links_array, 'title' => h($tenant->user->full_name)]); ?>
    <h3><?= h($tenant->user->full_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($tenant->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($tenant->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($tenant->end_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rent Start Due Day') ?></th>
            <td><?= h($tenant->rent_start_due_day) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= h($tenant->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Notice') ?></th>
            <td><?= h($tenant->notice) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount To Pay') ?></th>
            <td><?= h($tenant->amount_to_pay) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Work Address') ?></th>
            <td><?= h($tenant->work_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nin') ?></th>
            <td><?= h($tenant->nin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Passport') ?></th>
            <td><?= h($tenant->passport) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $tenant->has('user') ? $this->Html->link($tenant->user->full_name, ['controller' => 'Users', 'action' => 'view', $tenant->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($tenant->created_at) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Units') ?></h4>
        <?php if (!empty($tenant->units)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Types') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('States') ?></th>
                <th scope="col"><?= __('Occupied') ?></th>
                <th scope="col"><?= __('Cost') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Rooms') ?></th>
                <th scope="col"><?= __('Property Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tenant->units as $units): ?>
            <tr>
                <td><?= h($units->id) ?></td>
                <td><?= h($units->types) ?></td>
                <td><?= h($units->name) ?></td>
                <td><?= h($units->states) ?></td>
                <td><?= h($units->occupied) ?></td>
                <td><?= h($units->cost) ?></td>
                <td><?= h($units->description) ?></td>
                <td><?= h($units->rooms) ?></td>
                <td><?= h($units->property_id) ?></td>
                <td><?= h($units->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Units', 'action' => 'view', $units->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Units', 'action' => 'edit', $units->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Units', 'action' => 'delete', $units->id], ['confirm' => __('Are you sure you want to delete # {0}?', $units->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
