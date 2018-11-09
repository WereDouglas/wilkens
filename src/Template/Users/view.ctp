<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?=$this->Html->css('base.css')?>



<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2> DETAILS </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li class="heading"><?= __('Actions') ?></li>
                            <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
                            <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
                            <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
                            <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="users view large-9 medium-8 columns content">
                            <h3><?= h($user->first_name) ?></h3>
                            <table class="vertical-table">
                                <tr>
                                    <th scope="row"><?= __('Id') ?></th>
                                    <td><?= h($user->id) ?></td>
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
                                    <th scope="row"><?= __('Company') ?></th>
                                    <td><?= $user->has('company') ? $this->Html->link($user->company->name, ['controller' => 'Companies', 'action' => 'view', $user->company->id]) : '' ?></td>
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
                                            <th scope="col"><?= __('Client Id') ?></th>
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
                                                <td><?= h($tenants->client_id) ?></td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








