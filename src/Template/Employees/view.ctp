<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<?=$this->Html->css('base.css')?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rents'), ['controller' => 'Rents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rent'), ['controller' => 'Rents', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employees view large-9 medium-8 columns content">
    <h3><?= h($employee->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($employee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $employee->has('user') ? $this->Html->link($employee->user->id, ['controller' => 'Users', 'action' => 'view', $employee->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= $employee->has('company') ? $this->Html->link($employee->company->name, ['controller' => 'Companies', 'action' => 'view', $employee->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Branch') ?></th>
            <td><?= $employee->has('branch') ? $this->Html->link($employee->branch->name, ['controller' => 'Branches', 'action' => 'view', $employee->branch->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Department') ?></th>
            <td><?= $employee->has('department') ? $this->Html->link($employee->department->name, ['controller' => 'Departments', 'action' => 'view', $employee->department->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= h($employee->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($employee->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No') ?></th>
            <td><?= h($employee->no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($employee->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($employee->end_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($employee->created_at) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Rents') ?></h4>
        <?php if (!empty($employee->rents)): ?>
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
            <?php foreach ($employee->rents as $rents): ?>
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
</div>
