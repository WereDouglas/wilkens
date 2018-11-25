<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Installment[]|\Cake\Collection\CollectionInterface $installments
 */
$links_array = [
    ['New Installment', ['action' => 'add']],
    ['List Installment', ['controller' => 'Installment', 'action' => 'index']]
];
?>

<div class="installments index large-12 medium-8 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=>'Installments']);   ?>

    <table cellpadding="0" cellspacing="0" class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Tenant') ?></th>

                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('paid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>

                <th scope="col"><?= $this->Paginator->sort('method') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deadline') ?></th>
                <th scope="col"><?= $this->Paginator->sort('balance') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Received by') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($installments as $installment): ?>
            <tr>
                <td><?= $installment->has('user') ? $this->Html->link($installment->user->full_name, ['controller' => 'Users', 'action' => 'view', $installment->user->id]) : '' ?></td>
                <td><?= $this->Number->format($installment->amount) ?></td>
                <td><?= h($installment->paid) ?></td>
                <td><?= $this->Number->format($installment->no) ?></td>
                <td><?= h($installment->date) ?></td>
                 <td><?= h($installment->method) ?></td>
                <td><?= h($installment->deadline) ?></td>
                <td><?= $this->Number->format($installment->balance) ?></td>
                <td><?= h($installment->receiver->full_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $installment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $installment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $installment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $installment->id)]) ?>
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
