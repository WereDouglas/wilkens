<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exception $exception
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $exception->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $exception->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Exceptions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="exceptions form large-9 medium-8 columns content">
    <?= $this->Form->create($exception) ?>
    <fieldset>
        <legend><?= __('Edit Exception') ?></legend>
        <?php
            echo $this->Form->control('message');
            echo $this->Form->control('process');
            echo $this->Form->control('created_at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
