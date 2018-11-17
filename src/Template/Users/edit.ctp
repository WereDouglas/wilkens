<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
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
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('contact');
            echo $this->Form->control('email');
            echo $this->Form->control('photo');
            echo $this->Form->control('address');
            echo $this->Form->control('password');
            echo $this->Form->control('active');
            echo $this->Form->control('created_at');
            echo $this->Form->control('photo_dir');
            echo $this->Form->control('photo_size');
            echo $this->Form->control('photo_type');
            echo $this->Form->control('type');
            echo $this->Form->control('title');
            echo $this->Form->control('company_id', ['options' => $companies, 'empty' => true]);
            echo $this->Form->control('user_id');
            echo $this->Form->control('permissions._ids', ['options' => $permissions]);
            echo $this->Form->control('roles._ids', ['options' => $roles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
