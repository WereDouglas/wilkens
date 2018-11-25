<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rent[]|\Cake\Collection\CollectionInterface $rents
 */
$links_array = [
    ['List Rents', ['action' => 'index']],
    ['List Penalties', ['controller' => 'Penalties', 'action' => 'index']],
    ['List Users', ['controller' => 'Users', 'action' => 'index']]
];
?>
<div class="rents index large-12 medium-12 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=>'List of  Rent Payments']);   ?>

    <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-hover dataTable js-exportable">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Tenant') ?></th>
                <th scope="col"><?= $this->Paginator->sort('method') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_cost') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_paid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('for_client') ?></th>
                <th scope="col"><?= $this->Paginator->sort('percentage_used') ?></th>
                <th scope="col"><?= $this->Paginator->sort('for_commission') ?></th>
                <th scope="col"><?= $this->Paginator->sort('paid_to_client') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unpaid_months') ?></th>
                <th scope="col"><?= $this->Paginator->sort('paid_months') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vat') ?></th>
                <th scope="col"><?= $this->Paginator->sort('balance') ?></th>
                <th scope="col"><?= $this->Paginator->sort('branch_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cheque_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('receive_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('editable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('landlord_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deposit_id') ?></th>
                 <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rents as $rent): ?>
            <tr>
                <td><?= h($rent->date) ?></td>
                <td><?= h($rent->occupant->full_name) ?></td>
                <td><?= h($rent->method) ?></td>
                <td><?= h($rent->no) ?></td>
                <td><?= $this->Number->format($rent->total_cost) ?></td>
                <td><?= $this->Number->format($rent->total_paid) ?></td>
                <td><?= $this->Number->format($rent->for_client) ?></td>
                <td><?= $this->Number->format($rent->percentage_used) ?>%</td>
                <td><?= $this->Number->format($rent->for_commission) ?></td>
                <td><?= h($rent->paid_to_client) ?></td>
                <td><?= h($rent->start_date) ?></td>
                <td><?= h($rent->end_date) ?></td>
                <td><?= $this->Number->format($rent->unpaid_months) ?></td>
                <td><?= $this->Number->format($rent->paid_months) ?></td>
                <td><?= $this->Number->format($rent->vat) ?></td>
                <td><?= $this->Number->format($rent->balance) ?></td>
                <td><?= $rent->has('branch') ? $this->Html->link($rent->branch->name, ['controller' => 'Branches', 'action' => 'view', $rent->branch->id]) : '' ?></td>
                <td><?= h($rent->cheque_no) ?></td>
                <td><?= h($rent->receive_id) ?></td>
                <td><?= h($rent->editable) ?></td>
                <td><?= h($rent->created_at) ?></td>
                <td><?= h($rent->landlord->full_name) ?></td>
                <td><?= $rent->has('deposit') ? $this->Html->link($rent->deposit->id, ['controller' => 'Deposits', 'action' => 'view', $rent->deposit->id]) : '' ?></td>

                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rent->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rent->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rent->id)]) ?>
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
