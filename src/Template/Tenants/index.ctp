<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tenant[]|\Cake\Collection\CollectionInterface $tenants
 */
$links_array = [
    ['List Tenants', ['action' => 'index']],
    ['Add Tenant', ['action' => 'add']],
    ['New Users', ['controller' => 'Users', 'action' => 'view']],
    ['List Units', ['controller' => 'Units', 'action' => 'index']]
];
?>

<div class="tenants index large-12 medium-12 columns content">
    <?= $this->Element('nav', ['links' => $links_array, 'title' => 'Tenants']); ?>
    <table cellpadding="0" cellspacing="0"  class="table table-bordered table-striped table-hover dataTable js-exportable">
        <thead>
            <tr>
                <th style="display: none" scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Tenant') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rent_start_due_day') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('notice') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount_to_pay') ?></th>
                <th scope="col"><?= $this->Paginator->sort('work_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('passport') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>

                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tenants as $tenant): ?>
            <tr>
                <td  style="display: none"><?= h($tenant->id) ?></td>
                <td><?= $tenant->has('user') ? $this->Html->link($tenant->user->full_name, ['controller' => 'Users', 'action' => 'view', $tenant->user->id]) : '' ?></td>
                <td><?= h($tenant->start_date) ?></td>
                <td><?= h($tenant->end_date) ?></td>
                <td><?= h($tenant->rent_start_due_day) ?></td>
                <td><?= h($tenant->active) ?></td>
                <td><?= h($tenant->notice) ?></td>
                <td><?= $this->Number->format($tenant->amount_to_pay) ?></td>
                <td><?= h($tenant->work_address) ?></td>
                <td><?= h($tenant->nin) ?></td>
                <td><?= h($tenant->passport) ?></td>
                <td><?= h($tenant->created_at) ?></td>
                    <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tenant->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tenant->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tenant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tenant->id)]) ?>
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
<script>

    $('#example').dataTable({
        "paging": false
    });
</script>
