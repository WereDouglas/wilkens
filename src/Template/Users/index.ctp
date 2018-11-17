<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<?=$this->Html->css('base.css')?>
<?= $this->element('tableCss') ?>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <div class="header medium-3">
        <ul class="header-dropdown m-r--5">
            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle " data-toggle="dropdown" role="button"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">more_vert</i>
                </a>
                <ul class="dropdown-menu pull-right">
                    <li class="heading"><?= __('Actions') ?></li>
                    <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Confiscations'), ['controller' => 'Confiscations', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Confiscation'), ['controller' => 'Confiscations', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Contacts'), ['controller' => 'Contacts', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Contact'), ['controller' => 'Contacts', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Damages'), ['controller' => 'Damages', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Damage'), ['controller' => 'Damages', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Deposits'), ['controller' => 'Deposits', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Deposit'), ['controller' => 'Deposits', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Evictions'), ['controller' => 'Evictions', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Eviction'), ['controller' => 'Evictions', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Kins'), ['controller' => 'Kins', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Kin'), ['controller' => 'Kins', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Monthly Payments'), ['controller' => 'MonthlyPayments', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Monthly Payment'), ['controller' => 'MonthlyPayments', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Passwords'), ['controller' => 'Passwords', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Password'), ['controller' => 'Passwords', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Penalties'), ['controller' => 'Penalties', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Penalty'), ['controller' => 'Penalties', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Refunds'), ['controller' => 'Refunds', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Refund'), ['controller' => 'Refunds', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Requisitions'), ['controller' => 'Requisitions', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Requisition'), ['controller' => 'Requisitions', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Securities'), ['controller' => 'Securities', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Security'), ['controller' => 'Securities', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Tenants Units'), ['controller' => 'TenantsUnits', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Tenants Unit'), ['controller' => 'TenantsUnits', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Utilities'), ['controller' => 'Utilities', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Utility'), ['controller' => 'Utilities', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>     </ul>
            </li>
        </ul>
    </div>
    <table cellpadding="0" cellspacing="0"  class="table table-bordered table-striped table-hover dataTable js-exportable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th style="display: none" scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>

                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_dir') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $ct= 1; foreach ($users as $user): ?>
            <tr>
                <td><?= $ct++ ?></td>
                <td style="display: none"><?= h($user->id) ?></td>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->last_name) ?></td>
                <td><?= h($user->contact) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->photo) ?></td>
                <td><?= h($user->address) ?></td>

                <td><?= h($user->active) ?></td>
                <td><?= h($user->created_at) ?></td>
                <td><?= h($user->photo_dir) ?></td>
                <td><?= $this->Number->format($user->photo_size) ?></td>
                <td><?= h($user->photo_type) ?></td>
                <td><?= h($user->type) ?></td>
                <td><?= h($user->title) ?></td>
                <td><?= $user->has('company') ? $this->Html->link($user->company->name, ['controller' => 'Companies', 'action' => 'view', $user->company->id]) : '' ?></td>
                <td><?= h($user->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
