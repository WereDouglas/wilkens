<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Account $account
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Account'), ['action' => 'edit', $account->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Account'), ['action' => 'delete', $account->id], ['confirm' => __('Are you sure you want to delete # {0}?', $account->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Accounts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Deposits'), ['controller' => 'Deposits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deposit'), ['controller' => 'Deposits', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="accounts view large-9 medium-8 columns content">
    <h3><?= h($account->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($account->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No') ?></th>
            <td><?= h($account->no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($account->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account Name') ?></th>
            <td><?= h($account->account_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bank Name') ?></th>
            <td><?= h($account->bank_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $account->has('user') ? $this->Html->link($account->user->id, ['controller' => 'Users', 'action' => 'view', $account->user->id]) : '' ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Deposits') ?></h4>
        <?php if (!empty($account->deposits)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Total Amount') ?></th>
                <th scope="col"><?= __('Rent Amount') ?></th>
                <th scope="col"><?= __('Expense Amount') ?></th>
                <th scope="col"><?= __('Method') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Prepared Id') ?></th>
                <th scope="col"><?= __('Approved Id') ?></th>
                <th scope="col"><?= __('Deposited Id') ?></th>
                <th scope="col"><?= __('Remarks') ?></th>
                <th scope="col"><?= __('Complete') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Account Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Account No') ?></th>
                <th scope="col"><?= __('Account Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($account->deposits as $deposits): ?>
            <tr>
                <td><?= h($deposits->id) ?></td>
                <td><?= h($deposits->total_amount) ?></td>
                <td><?= h($deposits->rent_amount) ?></td>
                <td><?= h($deposits->expense_amount) ?></td>
                <td><?= h($deposits->method) ?></td>
                <td><?= h($deposits->date) ?></td>
                <td><?= h($deposits->prepared_id) ?></td>
                <td><?= h($deposits->approved_id) ?></td>
                <td><?= h($deposits->deposited_id) ?></td>
                <td><?= h($deposits->remarks) ?></td>
                <td><?= h($deposits->complete) ?></td>
                <td><?= h($deposits->created_at) ?></td>
                <td><?= h($deposits->account_id) ?></td>
                <td><?= h($deposits->user_id) ?></td>
                <td><?= h($deposits->account_no) ?></td>
                <td><?= h($deposits->account_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Deposits', 'action' => 'view', $deposits->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Deposits', 'action' => 'edit', $deposits->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Deposits', 'action' => 'delete', $deposits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deposits->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
