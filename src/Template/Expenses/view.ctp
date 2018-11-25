<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Expense $expense
 */
$links_array = [
    ['New Expense', ['action' => 'add']],
    ['List Requisitions', ['controller' => 'Requisitions', 'action' => 'index']],
    ['New Requisition', ['controller' => 'Requisitions', 'action' => 'add']],
];
?>
<div class="expenses view large-9 medium-8 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=> h($expense->no)]);   ?>

    <table class="vertical-table">

        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= h($expense->item) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requisition') ?></th>
            <td><?= $expense->has('requisition') ? $this->Html->link($expense->requisition->no, ['controller' => 'Requisitions', 'action' => 'view', $expense->requisition->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Editable') ?></th>
            <td><?= h($expense->editable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Qty') ?></th>
            <td><?= $this->Number->format($expense->qty) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cost') ?></th>
            <td><?= $this->Number->format($expense->cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td><?= $this->Number->format($expense->total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No') ?></th>
            <td><?= $this->Number->format($expense->no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($expense->created_at) ?></td>
        </tr>
    </table>
    <?= $this->Html->link(__('Edit Expense'), ['action' => 'edit', $expense->id]) ?>
</div>
