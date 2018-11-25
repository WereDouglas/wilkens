<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$links_array = [
    ['List Users', ['action' => 'index']],
    ['New User', ['controller' => 'Users', 'action' => 'add']],
    ['List Companies', ['controller' => 'Companies', 'action' => 'index']],
    ['New Contact', ['controller' => 'Contacts', 'action' => 'add']],

];
?>


<div class="users view large-9 medium-8 columns content">

    <?= $this->Element('nav',['links'=>$links_array,'title'=>'View User']);   ?>


    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($user->full_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= h($user->contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($user->photo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($user->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= h($user->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Dir') ?></th>
            <td><?= h($user->photo_dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Type') ?></th>
            <td><?= h($user->photo_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($user->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($user->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= $user->has('company') ? $this->Html->link($user->company->name, ['controller' => 'Companies', 'action' => 'view', $user->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= h($user->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Size') ?></th>
            <td><?= $this->Number->format($user->photo_size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($user->created_at) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Permissions') ?></h4>
        <?php if (!empty($user->permissions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->permissions as $permissions): ?>
            <tr>
                <td><?= h($permissions->id) ?></td>
                <td><?= h($permissions->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Permissions', 'action' => 'view', $permissions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Permissions', 'action' => 'edit', $permissions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Permissions', 'action' => 'delete', $permissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Roles') ?></h4>
        <?php if (!empty($user->roles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->roles as $roles): ?>
            <tr>
                <td><?= h($roles->id) ?></td>
                <td><?= h($roles->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Roles', 'action' => 'view', $roles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Roles', 'action' => 'edit', $roles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Roles', 'action' => 'delete', $roles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($user->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Contact') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Photo') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Photo Dir') ?></th>
                <th scope="col"><?= __('Photo Size') ?></th>
                <th scope="col"><?= __('Photo Type') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Company Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->first_name) ?></td>
                <td><?= h($users->last_name) ?></td>
                <td><?= h($users->contact) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->photo) ?></td>
                <td><?= h($users->address) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->active) ?></td>
                <td><?= h($users->created_at) ?></td>
                <td><?= h($users->photo_dir) ?></td>
                <td><?= h($users->photo_size) ?></td>
                <td><?= h($users->photo_type) ?></td>
                <td><?= h($users->type) ?></td>
                <td><?= h($users->title) ?></td>
                <td><?= h($users->company_id) ?></td>
                <td><?= h($users->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Accounts') ?></h4>
        <?php if (!empty($user->accounts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('No') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Account Name') ?></th>
                <th scope="col"><?= __('Bank Name') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->accounts as $accounts): ?>
            <tr>
                <td><?= h($accounts->id) ?></td>
                <td><?= h($accounts->no) ?></td>
                <td><?= h($accounts->type) ?></td>
                <td><?= h($accounts->account_name) ?></td>
                <td><?= h($accounts->bank_name) ?></td>
                <td><?= h($accounts->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Accounts', 'action' => 'view', $accounts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Accounts', 'action' => 'edit', $accounts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Accounts', 'action' => 'delete', $accounts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accounts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Clients') ?></h4>
        <?php if (!empty($user->clients)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Commission') ?></th>
                <th scope="col"><?= __('Contract') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Payment Terms') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Delivery Method') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Last Banked') ?></th>
                <th scope="col"><?= __('Manager Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->clients as $clients): ?>
            <tr>
                <td><?= h($clients->id) ?></td>
                <td><?= h($clients->commission) ?></td>
                <td><?= h($clients->contract) ?></td>
                <td><?= h($clients->start_date) ?></td>
                <td><?= h($clients->end_date) ?></td>
                <td><?= h($clients->active) ?></td>
                <td><?= h($clients->payment_terms) ?></td>
                <td><?= h($clients->code) ?></td>
                <td><?= h($clients->delivery_method) ?></td>
                <td><?= h($clients->created_at) ?></td>
                <td><?= h($clients->user_id) ?></td>
                <td><?= h($clients->last_banked) ?></td>
                <td><?= h($clients->manager_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Clients', 'action' => 'view', $clients->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Clients', 'action' => 'edit', $clients->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clients', 'action' => 'delete', $clients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clients->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Confiscations') ?></h4>
        <?php if (!empty($user->confiscations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Details') ?></th>
                <th scope="col"><?= __('Cost') ?></th>
                <th scope="col"><?= __('Sold') ?></th>
                <th scope="col"><?= __('Sold On') ?></th>
                <th scope="col"><?= __('Sold Id') ?></th>
                <th scope="col"><?= __('Storage Fees') ?></th>
                <th scope="col"><?= __('Deadline') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->confiscations as $confiscations): ?>
            <tr>
                <td><?= h($confiscations->id) ?></td>
                <td><?= h($confiscations->date) ?></td>
                <td><?= h($confiscations->details) ?></td>
                <td><?= h($confiscations->cost) ?></td>
                <td><?= h($confiscations->sold) ?></td>
                <td><?= h($confiscations->sold_on) ?></td>
                <td><?= h($confiscations->sold_id) ?></td>
                <td><?= h($confiscations->storage_fees) ?></td>
                <td><?= h($confiscations->deadline) ?></td>
                <td><?= h($confiscations->created_at) ?></td>
                <td><?= h($confiscations->user_id) ?></td>
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
        <h4><?= __('Related Contacts') ?></h4>
        <?php if (!empty($user->contacts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Contact') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->contacts as $contacts): ?>
            <tr>
                <td><?= h($contacts->id) ?></td>
                <td><?= h($contacts->type) ?></td>
                <td><?= h($contacts->contact) ?></td>
                <td><?= h($contacts->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Contacts', 'action' => 'view', $contacts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Contacts', 'action' => 'edit', $contacts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contacts', 'action' => 'delete', $contacts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contacts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Damages') ?></h4>
        <?php if (!empty($user->damages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Details') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Prepared Id') ?></th>
                <th scope="col"><?= __('Paid') ?></th>
                <th scope="col"><?= __('Repaired') ?></th>
                <th scope="col"><?= __('Date Repaired') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->damages as $damages): ?>
            <tr>
                <td><?= h($damages->id) ?></td>
                <td><?= h($damages->details) ?></td>
                <td><?= h($damages->amount) ?></td>
                <td><?= h($damages->date) ?></td>
                <td><?= h($damages->prepared_id) ?></td>
                <td><?= h($damages->paid) ?></td>
                <td><?= h($damages->repaired) ?></td>
                <td><?= h($damages->date_repaired) ?></td>
                <td><?= h($damages->created_at) ?></td>
                <td><?= h($damages->user_id) ?></td>
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
        <h4><?= __('Related Deposits') ?></h4>
        <?php if (!empty($user->deposits)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Total Amount') ?></th>
                <th scope="col"><?= __('Rent Amount') ?></th>
                <th scope="col"><?= __('Expense Amount') ?></th>
                <th scope="col"><?= __('Method') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Prepared Id') ?></th>
                <th scope="col"><?= __('Approved Id') ?></th>
                <th scope="col"><?= __('Deposited Id') ?></th>
                <th scope="col"><?= __('Remarks') ?></th>
                <th scope="col"><?= __('Complete') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Account Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Account No') ?></th>
                <th scope="col"><?= __('Account Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->deposits as $deposits): ?>
            <tr>
                <td><?= h($deposits->id) ?></td>
                <td><?= h($deposits->total_amount) ?></td>
                <td><?= h($deposits->rent_amount) ?></td>
                <td><?= h($deposits->expense_amount) ?></td>
                <td><?= h($deposits->method) ?></td>
                <td><?= h($deposits->date) ?></td>
                <td><?= h($deposits->prepared_id) ?></td>
                <td><?= h($deposits->approved_id) ?></td>
                <td><?= h($deposits->deposited_id) ?></td>
                <td><?= h($deposits->remarks) ?></td>
                <td><?= h($deposits->complete) ?></td>
                <td><?= h($deposits->created_at) ?></td>
                <td><?= h($deposits->account_id) ?></td>
                <td><?= h($deposits->user_id) ?></td>
                <td><?= h($deposits->account_no) ?></td>
                <td><?= h($deposits->account_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Deposits', 'action' => 'view', $deposits->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Deposits', 'action' => 'edit', $deposits->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Deposits', 'action' => 'delete', $deposits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deposits->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Employees') ?></h4>
        <?php if (!empty($user->employees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Company Id') ?></th>
                <th scope="col"><?= __('Branch Id') ?></th>
                <th scope="col"><?= __('Department Id') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('No') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->employees as $employees): ?>
            <tr>
                <td><?= h($employees->id) ?></td>
                <td><?= h($employees->user_id) ?></td>
                <td><?= h($employees->company_id) ?></td>
                <td><?= h($employees->branch_id) ?></td>
                <td><?= h($employees->department_id) ?></td>
                <td><?= h($employees->start_date) ?></td>
                <td><?= h($employees->end_date) ?></td>
                <td><?= h($employees->active) ?></td>
                <td><?= h($employees->address) ?></td>
                <td><?= h($employees->no) ?></td>
                <td><?= h($employees->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Employees', 'action' => 'view', $employees->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Employees', 'action' => 'edit', $employees->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Employees', 'action' => 'delete', $employees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employees->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Evictions') ?></h4>
        <?php if (!empty($user->evictions)): ?>
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
                <th scope="col"><?= __('Evicted Id') ?></th>
                <th scope="col"><?= __('Reason') ?></th>
                <th scope="col"><?= __('Remarks') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->evictions as $evictions): ?>
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
                <td><?= h($evictions->evicted_id) ?></td>
                <td><?= h($evictions->reason) ?></td>
                <td><?= h($evictions->remarks) ?></td>
                <td><?= h($evictions->user_id) ?></td>
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
        <h4><?= __('Related Kins') ?></h4>
        <?php if (!empty($user->kins)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Contact') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Photo') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->kins as $kins): ?>
            <tr>
                <td><?= h($kins->id) ?></td>
                <td><?= h($kins->name) ?></td>
                <td><?= h($kins->contact) ?></td>
                <td><?= h($kins->email) ?></td>
                <td><?= h($kins->photo) ?></td>
                <td><?= h($kins->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Kins', 'action' => 'view', $kins->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Kins', 'action' => 'edit', $kins->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Kins', 'action' => 'delete', $kins->id], ['confirm' => __('Are you sure you want to delete # {0}?', $kins->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Monthly Payments') ?></h4>
        <?php if (!empty($user->monthly_payments)): ?>
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
            <?php foreach ($user->monthly_payments as $monthlyPayments): ?>
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
        <h4><?= __('Related Passwords') ?></h4>
        <?php if (!empty($user->passwords)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->passwords as $passwords): ?>
            <tr>
                <td><?= h($passwords->id) ?></td>
                <td><?= h($passwords->password) ?></td>
                <td><?= h($passwords->created_at) ?></td>
                <td><?= h($passwords->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Passwords', 'action' => 'view', $passwords->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Passwords', 'action' => 'edit', $passwords->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Passwords', 'action' => 'delete', $passwords->id], ['confirm' => __('Are you sure you want to delete # {0}?', $passwords->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Penalties') ?></h4>
        <?php if (!empty($user->penalties)): ?>
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
            <?php foreach ($user->penalties as $penalties): ?>
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
    <div class="related">
        <h4><?= __('Related Properties') ?></h4>
        <?php if (!empty($user->properties)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Details') ?></th>
                <th scope="col"><?= __('No Of Rooms') ?></th>
                <th scope="col"><?= __('Manager Id') ?></th>
                <th scope="col"><?= __('Legal Id') ?></th>
                <th scope="col"><?= __('Terms') ?></th>
                <th scope="col"><?= __('Location') ?></th>
                <th scope="col"><?= __('Category') ?></th>
                <th scope="col"><?= __('Lng') ?></th>
                <th scope="col"><?= __('Lat') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->properties as $properties): ?>
            <tr>
                <td><?= h($properties->id) ?></td>
                <td><?= h($properties->name) ?></td>
                <td><?= h($properties->details) ?></td>
                <td><?= h($properties->no_of_rooms) ?></td>
                <td><?= h($properties->manager_id) ?></td>
                <td><?= h($properties->legal_id) ?></td>
                <td><?= h($properties->terms) ?></td>
                <td><?= h($properties->location) ?></td>
                <td><?= h($properties->category) ?></td>
                <td><?= h($properties->lng) ?></td>
                <td><?= h($properties->lat) ?></td>
                <td><?= h($properties->created_at) ?></td>
                <td><?= h($properties->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Properties', 'action' => 'view', $properties->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Properties', 'action' => 'edit', $properties->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Properties', 'action' => 'delete', $properties->id], ['confirm' => __('Are you sure you want to delete # {0}?', $properties->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Refunds') ?></h4>
        <?php if (!empty($user->refunds)): ?>
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
                <th scope="col"><?= __('Approved Id') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->refunds as $refunds): ?>
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
                <td><?= h($refunds->approved_id) ?></td>
                <td><?= h($refunds->created_at) ?></td>
                <td><?= h($refunds->user_id) ?></td>
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
        <h4><?= __('Related Requisitions') ?></h4>
        <?php if (!empty($user->requisitions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Details') ?></th>
                <th scope="col"><?= __('No') ?></th>
                <th scope="col"><?= __('Remarks') ?></th>
                <th scope="col"><?= __('Approved') ?></th>
                <th scope="col"><?= __('Approved Id') ?></th>
                <th scope="col"><?= __('Paid') ?></th>
                <th scope="col"><?= __('Paid Id') ?></th>
                <th scope="col"><?= __('Method') ?></th>
                <th scope="col"><?= __('Repaired') ?></th>
                <th scope="col"><?= __('Requested Id') ?></th>
                <th scope="col"><?= __('Category') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Property Id') ?></th>
                <th scope="col"><?= __('Unit Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->requisitions as $requisitions): ?>
            <tr>
                <td><?= h($requisitions->id) ?></td>
                <td><?= h($requisitions->type) ?></td>
                <td><?= h($requisitions->date) ?></td>
                <td><?= h($requisitions->details) ?></td>
                <td><?= h($requisitions->no) ?></td>
                <td><?= h($requisitions->remarks) ?></td>
                <td><?= h($requisitions->approved) ?></td>
                <td><?= h($requisitions->approved_id) ?></td>
                <td><?= h($requisitions->paid) ?></td>
                <td><?= h($requisitions->paid_id) ?></td>
                <td><?= h($requisitions->method) ?></td>
                <td><?= h($requisitions->repaired) ?></td>
                <td><?= h($requisitions->requested_id) ?></td>
                <td><?= h($requisitions->category) ?></td>
                <td><?= h($requisitions->created_at) ?></td>
                <td><?= h($requisitions->user_id) ?></td>
                <td><?= h($requisitions->property_id) ?></td>
                <td><?= h($requisitions->unit_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Requisitions', 'action' => 'view', $requisitions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Requisitions', 'action' => 'edit', $requisitions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Requisitions', 'action' => 'delete', $requisitions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requisitions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Securities') ?></h4>
        <?php if (!empty($user->securities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Method') ?></th>
                <th scope="col"><?= __('Paid Back') ?></th>
                <th scope="col"><?= __('Approved') ?></th>
                <th scope="col"><?= __('Requested Id') ?></th>
                <th scope="col"><?= __('Approved Id') ?></th>
                <th scope="col"><?= __('Refunded') ?></th>
                <th scope="col"><?= __('No') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->securities as $securities): ?>
            <tr>
                <td><?= h($securities->id) ?></td>
                <td><?= h($securities->date) ?></td>
                <td><?= h($securities->amount) ?></td>
                <td><?= h($securities->method) ?></td>
                <td><?= h($securities->paid_back) ?></td>
                <td><?= h($securities->approved) ?></td>
                <td><?= h($securities->requested_id) ?></td>
                <td><?= h($securities->approved_id) ?></td>
                <td><?= h($securities->refunded) ?></td>
                <td><?= h($securities->no) ?></td>
                <td><?= h($securities->user_id) ?></td>
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
        <h4><?= __('Related Tenants') ?></h4>
        <?php if (!empty($user->tenants)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Rent Start Due Day') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Notice') ?></th>
                <th scope="col"><?= __('Amount To Pay') ?></th>
                <th scope="col"><?= __('Work Address') ?></th>
                <th scope="col"><?= __('Nin') ?></th>
                <th scope="col"><?= __('Passport') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Unit Id') ?></th>
                <th scope="col"><?= __('Property Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->tenants as $tenants): ?>
            <tr>
                <td><?= h($tenants->id) ?></td>
                <td><?= h($tenants->start_date) ?></td>
                <td><?= h($tenants->end_date) ?></td>
                <td><?= h($tenants->rent_start_due_day) ?></td>
                <td><?= h($tenants->active) ?></td>
                <td><?= h($tenants->notice) ?></td>
                <td><?= h($tenants->amount_to_pay) ?></td>
                <td><?= h($tenants->work_address) ?></td>
                <td><?= h($tenants->nin) ?></td>
                <td><?= h($tenants->passport) ?></td>
                <td><?= h($tenants->created_at) ?></td>
                <td><?= h($tenants->user_id) ?></td>
                <td><?= h($tenants->unit_id) ?></td>
                <td><?= h($tenants->property_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tenants', 'action' => 'view', $tenants->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tenants', 'action' => 'edit', $tenants->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tenants', 'action' => 'delete', $tenants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tenants->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tenants Units') ?></h4>
        <?php if (!empty($user->tenants_units)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Unit Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->tenants_units as $tenantsUnits): ?>
            <tr>
                <td><?= h($tenantsUnits->unit_id) ?></td>
                <td><?= h($tenantsUnits->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TenantsUnits', 'action' => 'view', $tenantsUnits->unit_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TenantsUnits', 'action' => 'edit', $tenantsUnits->unit_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TenantsUnits', 'action' => 'delete', $tenantsUnits->unit_id], ['confirm' => __('Are you sure you want to delete # {0}?', $tenantsUnits->unit_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Utilities') ?></h4>
        <?php if (!empty($user->utilities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Starting Reading') ?></th>
                <th scope="col"><?= __('Unit Cost') ?></th>
                <th scope="col"><?= __('Account No') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->utilities as $utilities): ?>
            <tr>
                <td><?= h($utilities->id) ?></td>
                <td><?= h($utilities->name) ?></td>
                <td><?= h($utilities->starting_reading) ?></td>
                <td><?= h($utilities->unit_cost) ?></td>
                <td><?= h($utilities->account_no) ?></td>
                <td><?= h($utilities->user_id) ?></td>
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
