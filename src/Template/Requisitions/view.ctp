<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requisition $requisition
 */
$links_array = [

    ['List Requisitions', ['controller' => 'Requisitions', 'action' => 'index']],
    ['New Requisition', ['controller' => 'Requisitions', 'action' => 'add']],
];
?>
<?=$this->Html->css('base.css')?>

<div class="requisitions view large-9 medium-8 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=>$requisition->no]);   ?>

    <table class="vertical-table">

        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($requisition->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved') ?></th>
            <td><?= h($requisition->approved) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved by') ?></th>
            <td><?= h($requisition->approver->full_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paid') ?></th>
            <td><?= h($requisition->paid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paid by') ?></th>
            <td><?= h($requisition->paider->full_name) ?></td>
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
            <th scope="row"><?= __('Requested by') ?></th>
            <td><?= h($requisition->requested->full_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= h($requisition->category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $requisition->has('user') ? $this->Html->link($requisition->user->full_name, ['controller' => 'Users', 'action' => 'view', $requisition->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Property') ?></th>
            <td><?= $requisition->has('property') ? $this->Html->link($requisition->property->name, ['controller' => 'Properties', 'action' => 'view', $requisition->property->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unit') ?></th>
            <td><?= $requisition->has('unit') ? $this->Html->link($requisition->unit->name, ['controller' => 'Units', 'action' => 'view', $requisition->unit->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No') ?></th>
            <td><?= $this->Number->format($requisition->no) ?></td>
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

                <th scope="col"><?= __('Item') ?></th>
                <th scope="col"><?= __('Qty') ?></th>
                <th scope="col"><?= __('Cost') ?></th>
                <th scope="col"><?= __('Total') ?></th>
                <th scope="col"><?= __('Created At') ?></th>

                <th scope="col"><?= __('Editable') ?></th>
                <th scope="col"><?= __('No') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($requisition->expenses as $expenses): ?>
            <tr>

                <td><?= h($expenses->item) ?></td>
                <td><?= h($expenses->qty) ?></td>
                <td><?= h($expenses->cost) ?></td>
                <td><?= h($expenses->total) ?></td>
                <td><?= h($expenses->created_at) ?></td>

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
