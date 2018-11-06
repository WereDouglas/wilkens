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
            <th scope="row"><?= __('Prepared By') ?></th>
            <td><?= h($deposit->prepared_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved By') ?></th>
            <td><?= h($deposit->approved_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deposited By') ?></th>
            <td><?= h($deposit->deposited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Complete') ?></th>
            <td><?= h($deposit->complete) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client') ?></th>
            <td><?= $deposit->has('client') ? $this->Html->link($deposit->client->id, ['controller' => 'Clients', 'action' => 'view', $deposit->client->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account') ?></th>
            <td><?= $deposit->has('account') ? $this->Html->link($deposit->account->id, ['controller' => 'Accounts', 'action' => 'view', $deposit->account->id]) : '' ?></td>
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
</div>
