<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bill $bill
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Bills'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Utilities'), ['controller' => 'Utilities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Utility'), ['controller' => 'Utilities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bills form large-9 medium-8 columns content">
    <?= $this->Form->create($bill) ?>
    <fieldset>
        <legend><?= __('Add Bill') ?></legend>
        <?php
            echo $this->Form->control('created_on');
            echo $this->Form->control('due_date', ['empty' => true]);
            echo $this->Form->control('previous_reading');
            echo $this->Form->control('current_reading');
            echo $this->Form->control('units_used');
            echo $this->Form->control('unit_cost');
            echo $this->Form->control('total_cost');
            echo $this->Form->control('created_id');
            echo $this->Form->control('paid');
            echo $this->Form->control('created_at');
            echo $this->Form->control('utility_id', ['options' => $utilities]);
            echo $this->Form->control('user_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
