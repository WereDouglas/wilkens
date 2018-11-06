<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rent $rent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rent->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rent->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Rents'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Monthly Payments'), ['controller' => 'MonthlyPayments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Monthly Payment'), ['controller' => 'MonthlyPayments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rents form large-9 medium-8 columns content">
    <?= $this->Form->create($rent) ?>
    <fieldset>
        <legend><?= __('Edit Rent') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('method');
            echo $this->Form->control('no');
            echo $this->Form->control('total_cost');
            echo $this->Form->control('total_paid');
            echo $this->Form->control('for_client');
            echo $this->Form->control('percentage_used');
            echo $this->Form->control('for_commission');
            echo $this->Form->control('paid_by');
            echo $this->Form->control('paid_to_client');
            echo $this->Form->control('banking_deposit_id');
            echo $this->Form->control('start_date');
            echo $this->Form->control('end_date');
            echo $this->Form->control('unpaid_months');
            echo $this->Form->control('paid_months');
            echo $this->Form->control('vat');
            echo $this->Form->control('balance');
            echo $this->Form->control('branch_id', ['options' => $branches, 'empty' => true]);
            echo $this->Form->control('cheque_no');
            echo $this->Form->control('recieved_by');
            echo $this->Form->control('editable');
            echo $this->Form->control('created_at');
            echo $this->Form->control('tenant_id', ['options' => $tenants]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
