<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Utility $utility
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $utility->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $utility->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Utilities'), ['action' => 'index']) ?></li>
      </ul>
</nav>
<div class="utilities form large-9 medium-8 columns content">
    <?= $this->Form->create($utility) ?>
    <fieldset>
        <legend><?= __('Edit Utility') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('starting_reading');
            echo $this->Form->control('unit_cost');
            echo $this->Form->control('account_no');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
