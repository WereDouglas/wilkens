<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Refund $refund
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $refund->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $refund->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Refunds'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="refunds form large-9 medium-8 columns content">
    <?= $this->Form->create($refund) ?>
    <fieldset>
        <legend><?= __('Edit Refund') ?></legend>
        <?php
            echo $this->Form->control('amount');
            echo $this->Form->control('bills');
            echo $this->Form->control('damages');
            echo $this->Form->control('rent_due');
            echo $this->Form->control('amount_refundable');
            echo $this->Form->control('date');
            echo $this->Form->control('paid');
            echo $this->Form->control('approved');
            echo $this->Form->control('approved_id');
            echo $this->Form->control('created_at');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
