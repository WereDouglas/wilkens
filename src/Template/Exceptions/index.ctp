<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exception[]|\Cake\Collection\CollectionInterface $exceptions
 */
?>
<?=$this->Html->css('base.css')?>
<?= $this->element('tableCss') ?>

<div class="exceptions index large-12 medium-12 columns content">
    <div class="header medium-3">
        <ul class="header-dropdown m-r--5">
            <span><?= __('Exceptions') ?></span>
            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle " data-toggle="dropdown" role="button"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">more_vert</i>

                </a>
                <ul class="dropdown-menu pull-right">

                    <li><?= $this->Html->link(__('New Exception'), ['action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
                </ul>
            </li>
        </ul>
    </div>
    <table cellpadding="0" cellspacing="0"  class="table table-bordered table-striped table-hover dataTable js-exportable">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('message') ?></th>
                <th scope="col"><?= $this->Paginator->sort('process') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($exceptions as $exception): ?>
            <tr>
                <td><?= $this->Number->format($exception->id) ?></td>
                <td><?= h($exception->message) ?></td>
                <td><?= h($exception->process) ?></td>
                <td><?= h($exception->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $exception->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $exception->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $exception->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exception->id)]) ?>
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
