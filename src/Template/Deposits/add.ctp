<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Deposit $deposit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Deposits'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deposits form large-9 medium-8 columns content">
    <?= $this->Form->create($deposit) ?>
    <fieldset>
        <legend><?= __('Add Deposit') ?></legend>
        <?php
            echo $this->Form->control('total_amount');
            echo $this->Form->control('rent_amount');
            echo $this->Form->control('expense_amount');
            echo $this->Form->control('method');
            echo $this->Form->control('date');
            echo $this->Form->control('prepared_id');
            echo $this->Form->control('approved_id');
            echo $this->Form->control('deposited_id');
            echo $this->Form->control('remarks');
            echo $this->Form->control('complete');
            echo $this->Form->control('created_at');
            echo $this->Form->control('account_id', ['options' => $accounts, 'empty' => true]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('account_no');
            echo $this->Form->control('account_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
