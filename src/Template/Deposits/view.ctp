<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Deposit $deposit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Deposit'), ['action' => 'edit', $deposit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Deposit'), ['action' => 'delete', $deposit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deposit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Deposits'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deposit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rents'), ['controller' => 'Rents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rent'), ['controller' => 'Rents', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="deposits view large-9 medium-8 columns content">
    <h3><?= h($deposit->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($deposit->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Method') ?></th>
            <td><?= h($deposit->method) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prepared Id') ?></th>
            <td><?= h($deposit->prepared_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved Id') ?></th>
            <td><?= h($deposit->approved_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deposited Id') ?></th>
            <td><?= h($deposit->deposited_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Complete') ?></th>
            <td><?= h($deposit->complete) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account') ?></th>
            <td><?= $deposit->has('account') ? $this->Html->link($deposit->account->id, ['controller' => 'Accounts', 'action' => 'view', $deposit->account->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $deposit->has('user') ? $this->Html->link($deposit->user->full_name, ['controller' => 'Users', 'action' => 'view', $deposit->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account No') ?></th>
            <td><?= h($deposit->account_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account Name') ?></th>
            <td><?= h($deposit->account_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Amount') ?></th>
            <td><?= $this->Number->format($deposit->total_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rent Amount') ?></th>
            <td><?= $this->Number->format($deposit->rent_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expense Amount') ?></th>
            <td><?= $this->Number->format($deposit->expense_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($deposit->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($deposit->created_at) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Remarks') ?></h4>
        <?= $this->Text->autoParagraph(h($deposit->remarks)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Rents') ?></h4>
        <?php if (!empty($deposit->rents)): ?>
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
            <?php foreach ($deposit->rents as $rents): ?>
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
