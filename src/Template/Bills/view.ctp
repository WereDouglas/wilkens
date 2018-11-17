<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bill $bill
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bill'), ['action' => 'edit', $bill->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bill'), ['action' => 'delete', $bill->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bill->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bills'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bill'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Utilities'), ['controller' => 'Utilities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Utility'), ['controller' => 'Utilities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bills view large-9 medium-8 columns content">
    <h3><?= h($bill->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($bill->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Previous Reading') ?></th>
            <td><?= h($bill->previous_reading) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Reading') ?></th>
            <td><?= h($bill->current_reading) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Units Used') ?></th>
            <td><?= h($bill->units_used) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created Id') ?></th>
            <td><?= h($bill->created_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paid') ?></th>
            <td><?= h($bill->paid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Utility') ?></th>
            <td><?= $bill->has('utility') ? $this->Html->link($bill->utility->name, ['controller' => 'Utilities', 'action' => 'view', $bill->utility->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= h($bill->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unit Cost') ?></th>
            <td><?= $this->Number->format($bill->unit_cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Cost') ?></th>
            <td><?= $this->Number->format($bill->total_cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($bill->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Due Date') ?></th>
            <td><?= h($bill->due_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($bill->created_at) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Payments') ?></h4>
        <?php if (!empty($bill->payments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Bill Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Reciever Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($bill->payments as $payments): ?>
            <tr>
                <td><?= h($payments->id) ?></td>
                <td><?= h($payments->bill_id) ?></td>
                <td><?= h($payments->amount) ?></td>
                <td><?= h($payments->date) ?></td>
                <td><?= h($payments->created_at) ?></td>
                <td><?= h($payments->reciever_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Payments', 'action' => 'view', $payments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Payments', 'action' => 'edit', $payments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Payments', 'action' => 'delete', $payments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
