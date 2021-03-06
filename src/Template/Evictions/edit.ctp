<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Eviction $eviction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $eviction->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $eviction->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Evictions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="evictions form large-9 medium-8 columns content">
    <?= $this->Form->create($eviction) ?>
    <fieldset>
        <legend><?= __('Edit Eviction') ?></legend>
        <?php
            echo $this->Form->control('balance');
            echo $this->Form->control('date', ['empty' => true]);
            echo $this->Form->control('costs_incurred');
            echo $this->Form->control('repair_costs');
            echo $this->Form->control('bill_costs');
            echo $this->Form->control('disposal_costs');
            echo $this->Form->control('evicted');
            echo $this->Form->control('details');
            echo $this->Form->control('evicted_on', ['empty' => true]);
            echo $this->Form->control('evicted_id');
            echo $this->Form->control('reason');
            echo $this->Form->control('remarks');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
