<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Log[]|\Cake\Collection\CollectionInterface $logs
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->element('tableCss') ?>
<div class="logs index large-12 medium-12 columns content">
    <div class="header medium-3">
        <ul class="header-dropdown m-r--5">
            <h3>
                <li class="dropdown">
                    <?= __('Logs') ?>
                    <a href="javascript:void(0);" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                        <i class="material-icons">more_vert</i>
                    </a>
                    <ul class="dropdown-menu pull-right">

                        <li><?= $this->Html->link(__('New Log'), ['action' => 'add']) ?></li>
                        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
                    </ul>
                </li>
            </h3>
        </ul>

    </div>
    <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-hover dataTable js-exportable">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= 'status code' ?></th>
                <th scope="col"><?= 'user' ?></th>
                <th scope="col"><?= $this->Paginator->sort('ip_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('request_method') ?></th>
                <th scope="col"><?= $this->Paginator->sort('request_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('request_headers') ?></th>
                <th scope="col"><?= $this->Paginator->sort('request_body') ?></th>

                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($logs as $log): ?>
            <tr>
                <td><?= $this->Number->format($log->id) ?></td>
                <td><?= $this->Number->format($log->status_code) ?></td>
                <td><?= $log->has('user') ? $this->Html->link($log->user->first_name, ['controller' => 'Users', 'action' => 'view', $log->user->id]) : '' ?></td>
                <td><?= h($log->ip_address) ?></td>
                <td><?= h($log->request_method) ?></td>
                <td><?= h($log->request_url) ?></td>
                <td><?= h($log->request_headers) ?></td>
                <td><?= h($log->request_body) ?></td>

                <td><?= h($log->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $log->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $log->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $log->id], ['confirm' => __('Are you sure you want to delete # {0}?', $log->id)]) ?>
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
