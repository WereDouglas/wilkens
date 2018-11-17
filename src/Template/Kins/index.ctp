<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kin[]|\Cake\Collection\CollectionInterface $kins
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->element('tableCss') ?>

<div class="kins index large-9 medium-8 columns content">
    <h3><?= __('Kins') ?></h3>
    <div class="header medium-3">
        <ul class="header-dropdown m-r--5">
            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle " data-toggle="dropdown" role="button"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">more_vert</i>

                </a>
                <ul class="dropdown-menu pull-right">
                    <li class="heading"><?= __('Actions') ?></li>
                    <li><?= $this->Html->link(__('New Kin'), ['action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
                </ul>
            </li>
        </ul>
    </div>
    <table cellpadding="0" cellspacing="0"
           class="table table-bordered table-striped table-hover dataTable js-exportable">
        <thead>
        <tr>
            <th style="display: none" scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
            <th scope="col"><?= $this->Paginator->sort('email') ?></th>
            <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($kins as $kin): ?>
            <tr>
                <td style="display: none"><?= h($kin->id) ?></td>
                <td><?= h($kin->name) ?></td>
                <td><?= h($kin->contact) ?></td>
                <td><?= h($kin->email) ?></td>
                <td><?= $kin->has('user') ? $this->Html->link($kin->user->first_name . ' ' . $kin->user->last_name, ['controller' => 'Users', 'action' => 'view', $kin->user->id]) : '' ?></td>
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
<?= $this->element('tableScripts') ?>
