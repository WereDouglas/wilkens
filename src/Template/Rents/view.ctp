<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rent $rent
 */
$links_array = [
    ['List Rents', ['action' => 'index']],
    ['List Penalties', ['controller' => 'Penalties', 'action' => 'index']],
    ['List Users', ['controller' => 'Users', 'action' => 'index']]
];
?>
<div class="rents view large-9 medium-8 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=> h($rent->id)]);   ?>

    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($rent->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Method') ?></th>
            <td><?= h($rent->method) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No') ?></th>
            <td><?= h($rent->no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paid To Client') ?></th>
            <td><?= h($rent->paid_to_client) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Branch') ?></th>
            <td><?= $rent->has('branch') ? $this->Html->link($rent->branch->name, ['controller' => 'Branches', 'action' => 'view', $rent->branch->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cheque No') ?></th>
            <td><?= h($rent->cheque_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Receive Id') ?></th>
            <td><?= h($rent->receive_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Editable') ?></th>
            <td><?= h($rent->editable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Landlord Id') ?></th>
            <td><?= h($rent->landlord_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deposit') ?></th>
            <td><?= $rent->has('deposit') ? $this->Html->link($rent->deposit->id, ['controller' => 'Deposits', 'action' => 'view', $rent->deposit->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $rent->has('user') ? $this->Html->link($rent->user->full_name, ['controller' => 'Users', 'action' => 'view', $rent->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Cost') ?></th>
            <td><?= $this->Number->format($rent->total_cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Paid') ?></th>
            <td><?= $this->Number->format($rent->total_paid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('For Client') ?></th>
            <td><?= $this->Number->format($rent->for_client) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Percentage Used') ?></th>
            <td><?= $this->Number->format($rent->percentage_used) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('For Commission') ?></th>
            <td><?= $this->Number->format($rent->for_commission) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unpaid Months') ?></th>
            <td><?= $this->Number->format($rent->unpaid_months) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paid Months') ?></th>
            <td><?= $this->Number->format($rent->paid_months) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vat') ?></th>
            <td><?= $this->Number->format($rent->vat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Balance') ?></th>
            <td><?= $this->Number->format($rent->balance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($rent->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($rent->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($rent->end_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($rent->created_at) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Monthly Payments') ?></h4>
        <?php if (!empty($rent->monthly_payments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Total Amount') ?></th>
                <th scope="col"><?= __('To Client') ?></th>
                <th scope="col"><?= __('For Commission') ?></th>
                <th scope="col"><?= __('Month') ?></th>
                <th scope="col"><?= __('Year') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Rent Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($rent->monthly_payments as $monthlyPayments): ?>
            <tr>
                <td><?= h($monthlyPayments->id) ?></td>
                <td><?= h($monthlyPayments->total_amount) ?></td>
                <td><?= h($monthlyPayments->to_client) ?></td>
                <td><?= h($monthlyPayments->for_commission) ?></td>
                <td><?= h($monthlyPayments->month) ?></td>
                <td><?= h($monthlyPayments->year) ?></td>
                <td><?= h($monthlyPayments->date) ?></td>
                <td><?= h($monthlyPayments->created_at) ?></td>
                <td><?= h($monthlyPayments->rent_id) ?></td>
                <td><?= h($monthlyPayments->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MonthlyPayments', 'action' => 'view', $monthlyPayments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MonthlyPayments', 'action' => 'edit', $monthlyPayments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MonthlyPayments', 'action' => 'delete', $monthlyPayments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $monthlyPayments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Penalties') ?></h4>
        <?php if (!empty($rent->penalties)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Total') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Rent Id') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Paid') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($rent->penalties as $penalties): ?>
            <tr>
                <td><?= h($penalties->id) ?></td>
                <td><?= h($penalties->total) ?></td>
                <td><?= h($penalties->user_id) ?></td>
                <td><?= h($penalties->rent_id) ?></td>
                <td><?= h($penalties->created_at) ?></td>
                <td><?= h($penalties->paid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Penalties', 'action' => 'view', $penalties->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Penalties', 'action' => 'edit', $penalties->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Penalties', 'action' => 'delete', $penalties->id], ['confirm' => __('Are you sure you want to delete # {0}?', $penalties->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
