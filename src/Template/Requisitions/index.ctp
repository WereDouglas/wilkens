<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requisition[]|\Cake\Collection\CollectionInterface $requisitions
 */
$links_array = [

    ['List Requisitions', ['controller' => 'Requisitions', 'action' => 'index']],
    ['New Requisition', ['controller' => 'Requisitions', 'action' => 'add']],
];
?>


<div class="requisitions index large-12 medium-12 columns content">

    <?= $this->Element('nav',['links'=>$links_array,'title'=>'Requisitions']);   ?>
    <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-hover dataTable js-exportable">
        <thead>
        <tr>
            <th class="hidden" scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('type') ?></th>
            <th scope="col"><?= $this->Paginator->sort('date') ?></th>
            <th scope="col"><?= $this->Paginator->sort('no') ?></th>
            <th scope="col"><?= $this->Paginator->sort('approved') ?></th>
            <th scope="col"><?= $this->Paginator->sort('approved_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('paid') ?></th>
            <th scope="col"><?= $this->Paginator->sort('paid_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('method') ?></th>
            <th scope="col"><?= $this->Paginator->sort('repaired') ?></th>
            <th scope="col"><?= $this->Paginator->sort('requested_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('category') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
            <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('property_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('unit_id') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($requisitions as $requisition): ?>
            <tr>
                <td class="hidden"><?= h($requisition->id) ?></td>
                <td><?= h($requisition->type) ?></td>
                <td><?= h($requisition->date) ?></td>
                <td><?= $this->Number->format($requisition->no) ?></td>
                <td><?= h($requisition->approved) ?></td>
                <td><?= h($requisition->approver->full_name) ?></td>
                <td><?= h($requisition->paid) ?></td>
                <td><?= h($requisition->paider->full_name) ?></td>
                <td><?= h($requisition->method) ?></td>
                <td><?= h($requisition->repaired) ?></td>
                <td><?= h($requisition->requested->full_name) ?></td>
                <td><?= h($requisition->category) ?></td>
                <td><?= h($requisition->created_at) ?></td>
                <td><?= $requisition->has('user') ? $this->Html->link($requisition->user->full_name, ['controller' => 'Users', 'action' => 'view', $requisition->user->id]) : '' ?></td>
                <td><?= $requisition->has('property') ? $this->Html->link($requisition->property->name, ['controller' => 'Properties', 'action' => 'view', $requisition->property->id]) : '' ?></td>
                <td><?= $requisition->has('unit') ? $this->Html->link($requisition->unit->name, ['controller' => 'Units', 'action' => 'view', $requisition->unit->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requisition->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requisition->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requisition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requisition->id)]) ?>
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
