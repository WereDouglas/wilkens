<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client[]|\Cake\Collection\CollectionInterface $clients
 */
$links_array = [
    ['List Clients', ['action' => 'index']],
    ['List Users', ['controller' => 'Users', 'action' => 'index']],
    ['New User', ['controller' => 'Users', 'action' => 'add']],

];
?>

<div class="clients index large-12 medium-12 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=>'List Clients']);   ?>
    <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-hover dataTable js-exportable">
        <thead>
            <tr>
                <th style="display: none"  scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Client') ?></th>
                <th scope="col"><?= $this->Paginator->sort('commission') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contract') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_terms') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('delivery_method') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>

                <th scope="col"><?= $this->Paginator->sort('last_banked') ?></th>
                <th scope="col"><?= $this->Paginator->sort('manager_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
            <tr>
                <td style="display: none" ><?= h($client->id) ?></td>
                <td><?= $this->Html->link(__(h($client->user->full_name)), ['controller' => 'Users','action' => 'view', $client->user->id]) ?>
                </td>
                <td><?= $this->Number->format($client->commission) ?>%</td>
                <td><?= $this->Number->format($client->contract) ?> year</td>
                <td><?= h($client->start_date) ?></td>
                <td><?= h($client->end_date) ?></td>
                <td><?= h($client->active) ?></td>
                <td><?= h($client->payment_terms) ?></td>
                <td><?= h($client->code) ?></td>
                <td><?= h($client->delivery_method) ?></td>
                <td><?= h($client->created_at) ?></td>

                <td><?= h($client->last_banked) ?></td>
                <td><?= $client->has('user') ? $this->Html->link($client->manager->full_name, ['controller' => 'Users', 'action' => 'view', $client->manager->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $client->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $client->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?>
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
