<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Unit $unit
 */
?>
<?=$this->Html->css('base.css')?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Unit'), ['action' => 'edit', $unit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Unit'), ['action' => 'delete', $unit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $unit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rents'), ['controller' => 'Rents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rent'), ['controller' => 'Rents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requisitions'), ['controller' => 'Requisitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requisition'), ['controller' => 'Requisitions', 'action' => 'add']) ?> </li>
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
            <th scope="row"><?= __('User') ?></th>
            <td><?= $unit->has('user') ? $this->Html->link($unit->user->first_name, ['controller' => 'Users', 'action' => 'view', $unit->user->id]) : '' ?></td>
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
    <div class="related">
        <h4><?= __('Related Rents') ?></h4>
        <?php if (!empty($unit->rents)): ?>
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
            <?php foreach ($unit->rents as $rents): ?>
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
        <h4><?= __('Related Requisitions') ?></h4>
        <?php if (!empty($unit->requisitions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Details') ?></th>
                <th scope="col"><?= __('No') ?></th>
                <th scope="col"><?= __('Remarks') ?></th>
                <th scope="col"><?= __('Approved') ?></th>
                <th scope="col"><?= __('Approved Id') ?></th>
                <th scope="col"><?= __('Paid') ?></th>
                <th scope="col"><?= __('Paid Id') ?></th>
                <th scope="col"><?= __('Method') ?></th>
                <th scope="col"><?= __('Repaired') ?></th>
                <th scope="col"><?= __('Requested Id') ?></th>
                <th scope="col"><?= __('Category') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Property Id') ?></th>
                <th scope="col"><?= __('Unit Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($unit->requisitions as $requisitions): ?>
            <tr>
                <td><?= h($requisitions->id) ?></td>
                <td><?= h($requisitions->type) ?></td>
                <td><?= h($requisitions->date) ?></td>
                <td><?= h($requisitions->details) ?></td>
                <td><?= h($requisitions->no) ?></td>
                <td><?= h($requisitions->remarks) ?></td>
                <td><?= h($requisitions->approved) ?></td>
                <td><?= h($requisitions->approved_id) ?></td>
                <td><?= h($requisitions->paid) ?></td>
                <td><?= h($requisitions->paid_id) ?></td>
                <td><?= h($requisitions->method) ?></td>
                <td><?= h($requisitions->repaired) ?></td>
                <td><?= h($requisitions->requested_id) ?></td>
                <td><?= h($requisitions->category) ?></td>
                <td><?= h($requisitions->created_at) ?></td>
                <td><?= h($requisitions->user_id) ?></td>
                <td><?= h($requisitions->property_id) ?></td>
                <td><?= h($requisitions->unit_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Requisitions', 'action' => 'view', $requisitions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Requisitions', 'action' => 'edit', $requisitions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Requisitions', 'action' => 'delete', $requisitions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requisitions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
