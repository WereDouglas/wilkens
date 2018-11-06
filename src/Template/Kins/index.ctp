<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kin[]|\Cake\Collection\CollectionInterface $kins
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Kin'), ['action' => 'add']) ?></li>
     </ul>
</nav>
<div class="kins index large-9 medium-8 columns content">
    <h3><?= __('Kins') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kins as $kin): ?>
            <tr>
                <td><?= h($kin->id) ?></td>
                <td><?= h($kin->name) ?></td>
                <td><?= h($kin->contact) ?></td>
                <td><?= h($kin->email) ?></td>
                <td><?= h($kin->photo) ?></td>
                <td><?= $kin->has('user') ? $this->Html->link($kin->user->id, ['controller' => 'Users', 'action' => 'view', $kin->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $kin->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $kin->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $kin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $kin->id)]) ?>
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
