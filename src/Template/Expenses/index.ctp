<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Expense[]|\Cake\Collection\CollectionInterface $expenses
 */

$links_array = [
    ['New Expense', ['action' => 'add']],
    ['List Requisitions', ['controller' => 'Requisitions', 'action' => 'index']],
    ['New Requisition', ['controller' => 'Requisitions', 'action' => 'add']],
];

?>
<div class="expenses index large-12 medium-12 columns content">

    <?= $this->Element('nav',['links'=>$links_array,'title'=>'Expenses']);   ?>

    <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-hover dataTable js-exportable">
        <thead>
            <tr>

                <th scope="col"><?= $this->Paginator->sort('item') ?></th>
                <th scope="col"><?= $this->Paginator->sort('qty') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cost') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requisition_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('editable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($expenses as $expense): ?>
            <tr>

                <td><?= h($expense->item) ?></td>
                <td><?= $this->Number->format($expense->qty) ?></td>
                <td><?= $this->Number->format($expense->cost) ?></td>
                <td><?= $this->Number->format($expense->total) ?></td>
                <td><?= h($expense->created_at) ?></td>
                <td><?= $expense->has('requisition') ? $this->Html->link($expense->requisition->no, ['controller' => 'Requisitions', 'action' => 'view', $expense->requisition->id]) : '' ?></td>
                <td><?= h($expense->editable) ?></td>
                <td><?= $this->Number->format($expense->no) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $expense->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $expense->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $expense->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expense->id)]) ?>
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
