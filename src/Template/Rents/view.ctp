<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rent $rent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rent'), ['action' => 'edit', $rent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rent'), ['action' => 'delete', $rent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rent'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Monthly Payments'), ['controller' => 'MonthlyPayments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Monthly Payment'), ['controller' => 'MonthlyPayments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rents view large-9 medium-8 columns content">
    <h3><?= h($rent->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($rent->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Method') ?></th>
            <td><?= h($rent->method) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No') ?></th>
            <td><?= h($rent->no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paid By') ?></th>
            <td><?= h($rent->paid_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paid To Client') ?></th>
            <td><?= h($rent->paid_to_client) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Banking Deposit Id') ?></th>
            <td><?= h($rent->banking_deposit_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Branch') ?></th>
            <td><?= $rent->has('branch') ? $this->Html->link($rent->branch->name, ['controller' => 'Branches', 'action' => 'view', $rent->branch->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cheque No') ?></th>
            <td><?= h($rent->cheque_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Recieved By') ?></th>
            <td><?= h($rent->recieved_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Editable') ?></th>
            <td><?= h($rent->editable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tenant') ?></th>
            <td><?= $rent->has('tenant') ? $this->Html->link($rent->tenant->id, ['controller' => 'Tenants', 'action' => 'view', $rent->tenant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Cost') ?></th>
            <td><?= $this->Number->format($rent->total_cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Paid') ?></th>
            <td><?= $this->Number->format($rent->total_paid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('For Client') ?></th>
            <td><?= $this->Number->format($rent->for_client) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Percentage Used') ?></th>
            <td><?= $this->Number->format($rent->percentage_used) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('For Commission') ?></th>
            <td><?= $this->Number->format($rent->for_commission) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unpaid Months') ?></th>
            <td><?= $this->Number->format($rent->unpaid_months) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paid Months') ?></th>
            <td><?= $this->Number->format($rent->paid_months) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vat') ?></th>
            <td><?= $this->Number->format($rent->vat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Balance') ?></th>
            <td><?= $this->Number->format($rent->balance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($rent->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($rent->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($rent->end_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($rent->created_at) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Monthly Payments') ?></h4>
        <?php if (!empty($rent->monthly_payments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Total Amount') ?></th>
                <th scope="col"><?= __('To Client') ?></th>
                <th scope="col"><?= __('For Commission') ?></th>
                <th scope="col"><?= __('Month') ?></th>
                <th scope="col"><?= __('Year') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Rent Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($rent->monthly_payments as $monthlyPayments): ?>
            <tr>
                <td><?= h($monthlyPayments->id) ?></td>
                <td><?= h($monthlyPayments->total_amount) ?></td>
                <td><?= h($monthlyPayments->to_client) ?></td>
                <td><?= h($monthlyPayments->for_commission) ?></td>
                <td><?= h($monthlyPayments->month) ?></td>
                <td><?= h($monthlyPayments->year) ?></td>
                <td><?= h($monthlyPayments->date) ?></td>
                <td><?= h($monthlyPayments->created_at) ?></td>
                <td><?= h($monthlyPayments->rent_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MonthlyPayments', 'action' => 'view', $monthlyPayments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MonthlyPayments', 'action' => 'edit', $monthlyPayments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MonthlyPayments', 'action' => 'delete', $monthlyPayments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $monthlyPayments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
