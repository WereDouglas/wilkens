<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Damage $damage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Damages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="damages form large-9 medium-8 columns content">
    <?= $this->Form->create($damage) ?>
    <fieldset>
        <legend><?= __('Add Damage') ?></legend>
        <?php
            echo $this->Form->control('details');
            echo $this->Form->control('amount');
            echo $this->Form->control('date', ['empty' => true]);
            echo $this->Form->control('prepared_id');
            echo $this->Form->control('paid');
            echo $this->Form->control('repaired');
            echo $this->Form->control('date_repaired', ['empty' => true]);
            echo $this->Form->control('created_at');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
