<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tenant $tenant
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tenant'), ['action' => 'edit', $tenant->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tenant'), ['action' => 'delete', $tenant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tenant->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tenants'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tenant'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Penalties'), ['controller' => 'Penalties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Penalty'), ['controller' => 'Penalties', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rents'), ['controller' => 'Rents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rent'), ['controller' => 'Rents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Securities'), ['controller' => 'Securities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Security'), ['controller' => 'Securities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tenants view large-9 medium-8 columns content">
    <h3><?= h($tenant->id) ?></h3>
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
            <td><?= $tenant->has('user') ? $this->Html->link($tenant->user->id, ['controller' => 'Users', 'action' => 'view', $tenant->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unit Id') ?></th>
            <td><?= h($tenant->unit_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Property Id') ?></th>
            <td><?= h($tenant->property_id) ?></td>
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
    <div class="related">
        <h4><?= __('Related Penalties') ?></h4>
        <?php if (!empty($tenant->penalties)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Total') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Rent Id') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Paid') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tenant->penalties as $penalties): ?>
            <tr>
                <td><?= h($penalties->id) ?></td>
                <td><?= h($penalties->total) ?></td>
                <td><?= h($penalties->user_id) ?></td>
                <td><?= h($penalties->rent_id) ?></td>
                <td><?= h($penalties->created_at) ?></td>
                <td><?= h($penalties->paid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Penalties', 'action' => 'view', $penalties->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Penalties', 'action' => 'edit', $penalties->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Penalties', 'action' => 'delete', $penalties->id], ['confirm' => __('Are you sure you want to delete # {0}?', $penalties->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Rents') ?></h4>
        <?php if (!empty($tenant->rents)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Method') ?></th>
                <th scope="col"><?= __('No') ?></th>
                <th scope="col"><?= __('Total Cost') ?></th>
                <th scope="col"><?= __('Total Paid') ?></th>
                <th scope="col"><?= __('For Client') ?></th>
                <th scope="col"><?= __('Percentage Used') ?></th>
                <th scope="col"><?= __('For Commission') ?></th>
                <th scope="col"><?= __('Paid To Client') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Unpaid Months') ?></th>
                <th scope="col"><?= __('Paid Months') ?></th>
                <th scope="col"><?= __('Vat') ?></th>
                <th scope="col"><?= __('Balance') ?></th>
                <th scope="col"><?= __('Branch Id') ?></th>
                <th scope="col"><?= __('Cheque No') ?></th>
                <th scope="col"><?= __('Receive Id') ?></th>
                <th scope="col"><?= __('Editable') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Landlord Id') ?></th>
                <th scope="col"><?= __('Deposit Id') ?></th>
                <th scope="col"><?= __('Occupant Id') ?></th>
                <th scope="col"><?= __('Unit Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tenant->rents as $rents): ?>
            <tr>
                <td><?= h($rents->id) ?></td>
                <td><?= h($rents->date) ?></td>
                <td><?= h($rents->method) ?></td>
                <td><?= h($rents->no) ?></td>
                <td><?= h($rents->total_cost) ?></td>
                <td><?= h($rents->total_paid) ?></td>
                <td><?= h($rents->for_client) ?></td>
                <td><?= h($rents->percentage_used) ?></td>
                <td><?= h($rents->for_commission) ?></td>
                <td><?= h($rents->paid_to_client) ?></td>
                <td><?= h($rents->start_date) ?></td>
                <td><?= h($rents->end_date) ?></td>
                <td><?= h($rents->unpaid_months) ?></td>
                <td><?= h($rents->paid_months) ?></td>
                <td><?= h($rents->vat) ?></td>
                <td><?= h($rents->balance) ?></td>
                <td><?= h($rents->branch_id) ?></td>
                <td><?= h($rents->cheque_no) ?></td>
                <td><?= h($rents->receive_id) ?></td>
                <td><?= h($rents->editable) ?></td>
                <td><?= h($rents->created_at) ?></td>
                <td><?= h($rents->landlord_id) ?></td>
                <td><?= h($rents->deposit_id) ?></td>
                <td><?= h($rents->occupant_id) ?></td>
                <td><?= h($rents->unit_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Rents', 'action' => 'view', $rents->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Rents', 'action' => 'edit', $rents->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rents', 'action' => 'delete', $rents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rents->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Securities') ?></h4>
        <?php if (!empty($tenant->securities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Method') ?></th>
                <th scope="col"><?= __('Paid Back') ?></th>
                <th scope="col"><?= __('Approved') ?></th>
                <th scope="col"><?= __('Requested Id') ?></th>
                <th scope="col"><?= __('Approved Id') ?></th>
                <th scope="col"><?= __('Refunded') ?></th>
                <th scope="col"><?= __('No') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tenant->securities as $securities): ?>
            <tr>
                <td><?= h($securities->id) ?></td>
                <td><?= h($securities->date) ?></td>
                <td><?= h($securities->amount) ?></td>
                <td><?= h($securities->method) ?></td>
                <td><?= h($securities->paid_back) ?></td>
                <td><?= h($securities->approved) ?></td>
                <td><?= h($securities->requested_id) ?></td>
                <td><?= h($securities->approved_id) ?></td>
                <td><?= h($securities->refunded) ?></td>
                <td><?= h($securities->no) ?></td>
                <td><?= h($securities->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Securities', 'action' => 'view', $securities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Securities', 'action' => 'edit', $securities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Securities', 'action' => 'delete', $securities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $securities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
