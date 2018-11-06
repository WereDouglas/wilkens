<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tenant $tenant
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tenant'), ['action' => 'edit', $tenant->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tenant'), ['action' => 'delete', $tenant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tenant->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tenants'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tenant'), ['action' => 'add']) ?> </li>
        </ul>
</nav>
<div class="tenants view large-9 medium-8 columns content">
    <h3><?= h($tenant->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($tenant->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($tenant->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($tenant->end_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rent Start Due Day') ?></th>
            <td><?= h($tenant->rent_start_due_day) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= h($tenant->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Notice') ?></th>
            <td><?= h($tenant->notice) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount To Pay') ?></th>
            <td><?= h($tenant->amount_to_pay) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Work Address') ?></th>
            <td><?= h($tenant->work_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nin') ?></th>
            <td><?= h($tenant->nin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Passport') ?></th>
            <td><?= h($tenant->passport) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $tenant->has('user') ? $this->Html->link($tenant->user->id, ['controller' => 'Users', 'action' => 'view', $tenant->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client Id') ?></th>
            <td><?= h($tenant->client_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($tenant->created_at) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Units') ?></h4>
        <?php if (!empty($tenant->units)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('State') ?></th>
                <th scope="col"><?= __('Occupied') ?></th>
                <th scope="col"><?= __('Cost') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Rooms') ?></th>
                <th scope="col"><?= __('Propery Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tenant->units as $units): ?>
            <tr>
                <td><?= h($units->id) ?></td>
                <td><?= h($units->type) ?></td>
                <td><?= h($units->name) ?></td>
                <td><?= h($units->state) ?></td>
                <td><?= h($units->occupied) ?></td>
                <td><?= h($units->cost) ?></td>
                <td><?= h($units->description) ?></td>
                <td><?= h($units->rooms) ?></td>
                <td><?= h($units->propery_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Units', 'action' => 'view', $units->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Units', 'action' => 'edit', $units->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Units', 'action' => 'delete', $units->id], ['confirm' => __('Are you sure you want to delete # {0}?', $units->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Confiscations') ?></h4>
        <?php if (!empty($tenant->confiscations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Details') ?></th>
                <th scope="col"><?= __('Cost') ?></th>
                <th scope="col"><?= __('Sold') ?></th>
                <th scope="col"><?= __('Sold On') ?></th>
                <th scope="col"><?= __('Sold By') ?></th>
                <th scope="col"><?= __('Storage Fees') ?></th>
                <th scope="col"><?= __('Deadline') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Tenant Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tenant->confiscations as $confiscations): ?>
            <tr>
                <td><?= h($confiscations->id) ?></td>
                <td><?= h($confiscations->date) ?></td>
                <td><?= h($confiscations->details) ?></td>
                <td><?= h($confiscations->cost) ?></td>
                <td><?= h($confiscations->sold) ?></td>
                <td><?= h($confiscations->sold_on) ?></td>
                <td><?= h($confiscations->sold_by) ?></td>
                <td><?= h($confiscations->storage_fees) ?></td>
                <td><?= h($confiscations->deadline) ?></td>
                <td><?= h($confiscations->created_at) ?></td>
                <td><?= h($confiscations->tenant_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Confiscations', 'action' => 'view', $confiscations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Confiscations', 'action' => 'edit', $confiscations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Confiscations', 'action' => 'delete', $confiscations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $confiscations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Damages') ?></h4>
        <?php if (!empty($tenant->damages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Details') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Prepared By') ?></th>
                <th scope="col"><?= __('Paid') ?></th>
                <th scope="col"><?= __('Repaired') ?></th>
                <th scope="col"><?= __('Date Repaired') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Tenant Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tenant->damages as $damages): ?>
            <tr>
                <td><?= h($damages->id) ?></td>
                <td><?= h($damages->details) ?></td>
                <td><?= h($damages->amount) ?></td>
                <td><?= h($damages->date) ?></td>
                <td><?= h($damages->prepared_by) ?></td>
                <td><?= h($damages->paid) ?></td>
                <td><?= h($damages->repaired) ?></td>
                <td><?= h($damages->date_repaired) ?></td>
                <td><?= h($damages->created_at) ?></td>
                <td><?= h($damages->tenant_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Damages', 'action' => 'view', $damages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Damages', 'action' => 'edit', $damages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Damages', 'action' => 'delete', $damages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $damages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Evictions') ?></h4>
        <?php if (!empty($tenant->evictions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Balance') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Costs Incurred') ?></th>
                <th scope="col"><?= __('Repair Costs') ?></th>
                <th scope="col"><?= __('Bill Costs') ?></th>
                <th scope="col"><?= __('Disposal Costs') ?></th>
                <th scope="col"><?= __('Evicted') ?></th>
                <th scope="col"><?= __('Details') ?></th>
                <th scope="col"><?= __('Evicted On') ?></th>
                <th scope="col"><?= __('Evicted By') ?></th>
                <th scope="col"><?= __('Reason') ?></th>
                <th scope="col"><?= __('Remarks') ?></th>
                <th scope="col"><?= __('Tenant Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tenant->evictions as $evictions): ?>
            <tr>
                <td><?= h($evictions->id) ?></td>
                <td><?= h($evictions->balance) ?></td>
                <td><?= h($evictions->date) ?></td>
                <td><?= h($evictions->costs_incurred) ?></td>
                <td><?= h($evictions->repair_costs) ?></td>
                <td><?= h($evictions->bill_costs) ?></td>
                <td><?= h($evictions->disposal_costs) ?></td>
                <td><?= h($evictions->evicted) ?></td>
                <td><?= h($evictions->details) ?></td>
                <td><?= h($evictions->evicted_on) ?></td>
                <td><?= h($evictions->evicted_by) ?></td>
                <td><?= h($evictions->reason) ?></td>
                <td><?= h($evictions->remarks) ?></td>
                <td><?= h($evictions->tenant_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Evictions', 'action' => 'view', $evictions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Evictions', 'action' => 'edit', $evictions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Evictions', 'action' => 'delete', $evictions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evictions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Penalties') ?></h4>
        <?php if (!empty($tenant->penalties)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Total') ?></th>
                <th scope="col"><?= __('Paid By') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Tenant Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tenant->penalties as $penalties): ?>
            <tr>
                <td><?= h($penalties->id) ?></td>
                <td><?= h($penalties->total) ?></td>
                <td><?= h($penalties->paid_by) ?></td>
                <td><?= h($penalties->created_at) ?></td>
                <td><?= h($penalties->tenant_id) ?></td>
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
    <div class="related">
        <h4><?= __('Related Refunds') ?></h4>
        <?php if (!empty($tenant->refunds)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Bills') ?></th>
                <th scope="col"><?= __('Damages') ?></th>
                <th scope="col"><?= __('Rent Due') ?></th>
                <th scope="col"><?= __('Amount Refundable') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Paid') ?></th>
                <th scope="col"><?= __('Approved') ?></th>
                <th scope="col"><?= __('Approved By') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Tenant Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tenant->refunds as $refunds): ?>
            <tr>
                <td><?= h($refunds->id) ?></td>
                <td><?= h($refunds->amount) ?></td>
                <td><?= h($refunds->bills) ?></td>
                <td><?= h($refunds->damages) ?></td>
                <td><?= h($refunds->rent_due) ?></td>
                <td><?= h($refunds->amount_refundable) ?></td>
                <td><?= h($refunds->date) ?></td>
                <td><?= h($refunds->paid) ?></td>
                <td><?= h($refunds->approved) ?></td>
                <td><?= h($refunds->approved_by) ?></td>
                <td><?= h($refunds->created_at) ?></td>
                <td><?= h($refunds->tenant_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Refunds', 'action' => 'view', $refunds->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Refunds', 'action' => 'edit', $refunds->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Refunds', 'action' => 'delete', $refunds->id], ['confirm' => __('Are you sure you want to delete # {0}?', $refunds->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Rents') ?></h4>
        <?php if (!empty($tenant->rents)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Method') ?></th>
                <th scope="col"><?= __('No') ?></th>
                <th scope="col"><?= __('Total Cost') ?></th>
                <th scope="col"><?= __('Total Paid') ?></th>
                <th scope="col"><?= __('For Client') ?></th>
                <th scope="col"><?= __('Percentage Used') ?></th>
                <th scope="col"><?= __('For Commission') ?></th>
                <th scope="col"><?= __('Paid By') ?></th>
                <th scope="col"><?= __('Paid To Client') ?></th>
                <th scope="col"><?= __('Banking Deposit Id') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Unpaid Months') ?></th>
                <th scope="col"><?= __('Paid Months') ?></th>
                <th scope="col"><?= __('Vat') ?></th>
                <th scope="col"><?= __('Balance') ?></th>
                <th scope="col"><?= __('Branch Id') ?></th>
                <th scope="col"><?= __('Cheque No') ?></th>
                <th scope="col"><?= __('Recieved By') ?></th>
                <th scope="col"><?= __('Editable') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Tenant Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tenant->rents as $rents): ?>
            <tr>
                <td><?= h($rents->id) ?></td>
                <td><?= h($rents->date) ?></td>
                <td><?= h($rents->method) ?></td>
                <td><?= h($rents->no) ?></td>
                <td><?= h($rents->total_cost) ?></td>
                <td><?= h($rents->total_paid) ?></td>
                <td><?= h($rents->for_client) ?></td>
                <td><?= h($rents->percentage_used) ?></td>
                <td><?= h($rents->for_commission) ?></td>
                <td><?= h($rents->paid_by) ?></td>
                <td><?= h($rents->paid_to_client) ?></td>
                <td><?= h($rents->banking_deposit_id) ?></td>
                <td><?= h($rents->start_date) ?></td>
                <td><?= h($rents->end_date) ?></td>
                <td><?= h($rents->unpaid_months) ?></td>
                <td><?= h($rents->paid_months) ?></td>
                <td><?= h($rents->vat) ?></td>
                <td><?= h($rents->balance) ?></td>
                <td><?= h($rents->branch_id) ?></td>
                <td><?= h($rents->cheque_no) ?></td>
                <td><?= h($rents->recieved_by) ?></td>
                <td><?= h($rents->editable) ?></td>
                <td><?= h($rents->created_at) ?></td>
                <td><?= h($rents->tenant_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Rents', 'action' => 'view', $rents->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Rents', 'action' => 'edit', $rents->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rents', 'action' => 'delete', $rents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rents->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Securities') ?></h4>
        <?php if (!empty($tenant->securities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Method') ?></th>
                <th scope="col"><?= __('Paid Back') ?></th>
                <th scope="col"><?= __('Approved') ?></th>
                <th scope="col"><?= __('Requested By') ?></th>
                <th scope="col"><?= __('Approved By') ?></th>
                <th scope="col"><?= __('Refunded') ?></th>
                <th scope="col"><?= __('No') ?></th>
                <th scope="col"><?= __('Tenant Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tenant->securities as $securities): ?>
            <tr>
                <td><?= h($securities->id) ?></td>
                <td><?= h($securities->date) ?></td>
                <td><?= h($securities->amount) ?></td>
                <td><?= h($securities->method) ?></td>
                <td><?= h($securities->paid_back) ?></td>
                <td><?= h($securities->approved) ?></td>
                <td><?= h($securities->requested_by) ?></td>
                <td><?= h($securities->approved_by) ?></td>
                <td><?= h($securities->refunded) ?></td>
                <td><?= h($securities->no) ?></td>
                <td><?= h($securities->tenant_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Securities', 'action' => 'view', $securities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Securities', 'action' => 'edit', $securities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Securities', 'action' => 'delete', $securities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $securities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Utilities') ?></h4>
        <?php if (!empty($tenant->utilities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Starting Reading') ?></th>
                <th scope="col"><?= __('Unit Cost') ?></th>
                <th scope="col"><?= __('Account No') ?></th>
                <th scope="col"><?= __('Tenant Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tenant->utilities as $utilities): ?>
            <tr>
                <td><?= h($utilities->id) ?></td>
                <td><?= h($utilities->name) ?></td>
                <td><?= h($utilities->starting_reading) ?></td>
                <td><?= h($utilities->unit_cost) ?></td>
                <td><?= h($utilities->account_no) ?></td>
                <td><?= h($utilities->tenant_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Utilities', 'action' => 'view', $utilities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Utilities', 'action' => 'edit', $utilities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Utilities', 'action' => 'delete', $utilities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $utilities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
