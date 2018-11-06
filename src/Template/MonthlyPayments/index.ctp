<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MonthlyPayment[]|\Cake\Collection\CollectionInterface $monthlyPayments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Monthly Payment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rents'), ['controller' => 'Rents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rent'), ['controller' => 'Rents', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="monthlyPayments index large-9 medium-8 columns content">
    <h3><?= __('Monthly Payments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('to_client') ?></th>
                <th scope="col"><?= $this->Paginator->sort('for_commission') ?></th>
                <th scope="col"><?= $this->Paginator->sort('month') ?></th>
                <th scope="col"><?= $this->Paginator->sort('year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rent_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($monthlyPayments as $monthlyPayment): ?>
            <tr>
                <td><?= h($monthlyPayment->id) ?></td>
                <td><?= $this->Number->format($monthlyPayment->total_amount) ?></td>
                <td><?= $this->Number->format($monthlyPayment->to_client) ?></td>
                <td><?= $this->Number->format($monthlyPayment->for_commission) ?></td>
                <td><?= h($monthlyPayment->month) ?></td>
                <td><?= h($monthlyPayment->year) ?></td>
                <td><?= h($monthlyPayment->date) ?></td>
                <td><?= h($monthlyPayment->created_at) ?></td>
                <td><?= $monthlyPayment->has('rent') ? $this->Html->link($monthlyPayment->rent->id, ['controller' => 'Rents', 'action' => 'view', $monthlyPayment->rent->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $monthlyPayment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $monthlyPayment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $monthlyPayment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $monthlyPayment->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
