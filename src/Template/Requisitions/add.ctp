<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requisition $requisition
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Requisitions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Expenses'), ['controller' => 'Expenses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Expense'), ['controller' => 'Expenses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requisitions form large-9 medium-8 columns content">
    <?= $this->Form->create($requisition) ?>
    <fieldset>
        <legend><?= __('Add Requisition') ?></legend>
        <?php
            echo $this->Form->control('type');
            echo $this->Form->control('date');
            echo $this->Form->control('details');
            echo $this->Form->control('no');
            echo $this->Form->control('remarks');
            echo $this->Form->control('approved');
            echo $this->Form->control('approved_by');
            echo $this->Form->control('paid');
            echo $this->Form->control('paid_by');
            echo $this->Form->control('method');
            echo $this->Form->control('repaired');
            echo $this->Form->control('requested_by_id');
            echo $this->Form->control('manager_id');
            echo $this->Form->control('category');
            echo $this->Form->control('created_at');
            echo $this->Form->control('client_id', ['options' => $clients, 'empty' => true]);
            echo $this->Form->control('company_id', ['options' => $companies, 'empty' => true]);
            echo $this->Form->control('property_id', ['options' => $properties, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
