<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Security[]|\Cake\Collection\CollectionInterface $securities
 */
$links_array = [
    ['List Securities', ['action' => 'index']],
    ['List Users', ['controller' => 'Users', 'action' => 'index']]
];
?>
<div class="securities index large-9 medium-8 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=>'Securities']);   ?>

    <table cellpadding="0" cellspacing="0" class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Tenant') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('method') ?></th>
                <th scope="col"><?= $this->Paginator->sort('paid_back') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requested_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('refunded') ?></th>

                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($securities as $security): ?>
            <tr>
                <td><?= $this->Number->format($security->id) ?></td>
                <td><?= $security->has('user') ? $this->Html->link($security->user->full_name, ['controller' => 'Users', 'action' => 'view', $security->user->id]) : '' ?></td>
                <td><?= h($security->date) ?></td>
                <td><?= $this->Number->format($security->amount) ?></td>
                <td><?= h($security->method) ?></td>
                <td><?= h($security->paid_back) ?></td>
                <td><?= h($security->approved) ?></td>
                <td><?= h($security->requester->full_name) ?></td>
                <td><?= h($security->approver->full_name) ?></td>
                <td><?= $this->Number->format($security->refunded) ?></td>

                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $security->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $security->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $security->id], ['confirm' => __('Are you sure you want to delete # {0}?', $security->id)]) ?>
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
