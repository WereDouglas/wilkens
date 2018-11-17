<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Confiscation $confiscation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $confiscation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $confiscation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Confiscations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="confiscations form large-9 medium-8 columns content">
    <?= $this->Form->create($confiscation) ?>
    <fieldset>
        <legend><?= __('Edit Confiscation') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('details');
            echo $this->Form->control('cost');
            echo $this->Form->control('sold');
            echo $this->Form->control('sold_on', ['empty' => true]);
            echo $this->Form->control('sold_id');
            echo $this->Form->control('storage_fees');
            echo $this->Form->control('deadline', ['empty' => true]);
            echo $this->Form->control('created_at');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
