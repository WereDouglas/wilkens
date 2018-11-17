<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requisition $requisition
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requisition'), ['action' => 'edit', $requisition->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requisition'), ['action' => 'delete', $requisition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requisition->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requisitions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requisition'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Expenses'), ['controller' => 'Expenses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Expense'), ['controller' => 'Expenses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requisitions view large-9 medium-8 columns content">
    <h3><?= h($requisition->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($requisition->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($requisition->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No') ?></th>
            <td><?= h($requisition->no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved') ?></th>
            <td><?= h($requisition->approved) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved Id') ?></th>
            <td><?= h($requisition->approved_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paid') ?></th>
            <td><?= h($requisition->paid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paid Id') ?></th>
            <td><?= h($requisition->paid_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Method') ?></th>
            <td><?= h($requisition->method) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Repaired') ?></th>
            <td><?= h($requisition->repaired) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requested Id') ?></th>
            <td><?= h($requisition->requested_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= h($requisition->category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $requisition->has('user') ? $this->Html->link($requisition->user->id, ['controller' => 'Users', 'action' => 'view', $requisition->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Property Id') ?></th>
            <td><?= h($requisition->property_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unit Id') ?></th>
            <td><?= h($requisition->unit_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($requisition->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($requisition->created_at) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Details') ?></h4>
        <?= $this->Text->autoParagraph(h($requisition->details)); ?>
    </div>
    <div class="row">
        <h4><?= __('Remarks') ?></h4>
        <?= $this->Text->autoParagraph(h($requisition->remarks)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Expenses') ?></h4>
        <?php if (!empty($requisition->expenses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Item') ?></th>
                <th scope="col"><?= __('Qty') ?></th>
                <th scope="col"><?= __('Cost') ?></th>
                <th scope="col"><?= __('Total') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Requisition Id') ?></th>
                <th scope="col"><?= __('Editable') ?></th>
                <th scope="col"><?= __('No') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($requisition->expenses as $expenses): ?>
            <tr>
                <td><?= h($expenses->id) ?></td>
                <td><?= h($expenses->item) ?></td>
                <td><?= h($expenses->qty) ?></td>
                <td><?= h($expenses->cost) ?></td>
                <td><?= h($expenses->total) ?></td>
                <td><?= h($expenses->created_at) ?></td>
                <td><?= h($expenses->requisition_id) ?></td>
                <td><?= h($expenses->editable) ?></td>
                <td><?= h($expenses->no) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Expenses', 'action' => 'view', $expenses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Expenses', 'action' => 'edit', $expenses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Expenses', 'action' => 'delete', $expenses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expenses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
