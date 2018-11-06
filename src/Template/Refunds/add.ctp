<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Refund $refund
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Refunds'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="refunds form large-9 medium-8 columns content">
    <?= $this->Form->create($refund) ?>
    <fieldset>
        <legend><?= __('Add Refund') ?></legend>
        <?php
            echo $this->Form->control('amount');
            echo $this->Form->control('bills');
            echo $this->Form->control('damages');
            echo $this->Form->control('rent_due');
            echo $this->Form->control('amount_refundable');
            echo $this->Form->control('date');
            echo $this->Form->control('paid');
            echo $this->Form->control('approved');
            echo $this->Form->control('approved_by');
            echo $this->Form->control('created_at');
            echo $this->Form->control('tenant_id', ['options' => $tenants]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
