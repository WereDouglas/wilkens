<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requisition $requisition
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $requisition->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $requisition->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Requisitions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Expenses'), ['controller' => 'Expenses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Expense'), ['controller' => 'Expenses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requisitions form large-9 medium-8 columns content">
    <?= $this->Form->create($requisition) ?>
    <fieldset>
        <legend><?= __('Edit Requisition') ?></legend>
        <?php
            echo $this->Form->control('type');
            echo $this->Form->control('date');
            echo $this->Form->control('details');
            echo $this->Form->control('no');
            echo $this->Form->control('remarks');
            echo $this->Form->control('approved');
            echo $this->Form->control('approved_id');
            echo $this->Form->control('paid');
            echo $this->Form->control('paid_id');
            echo $this->Form->control('method');
            echo $this->Form->control('repaired');
            echo $this->Form->control('requested_id');
            echo $this->Form->control('category');
            echo $this->Form->control('created_at');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('property_id');
            echo $this->Form->control('unit_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
