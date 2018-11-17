<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MonthlyPayment $monthlyPayment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $monthlyPayment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $monthlyPayment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Monthly Payments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rents'), ['controller' => 'Rents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rent'), ['controller' => 'Rents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="monthlyPayments form large-9 medium-8 columns content">
    <?= $this->Form->create($monthlyPayment) ?>
    <fieldset>
        <legend><?= __('Edit Monthly Payment') ?></legend>
        <?php
            echo $this->Form->control('total_amount');
            echo $this->Form->control('to_client');
            echo $this->Form->control('for_commission');
            echo $this->Form->control('month');
            echo $this->Form->control('year');
            echo $this->Form->control('date');
            echo $this->Form->control('created_at');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
