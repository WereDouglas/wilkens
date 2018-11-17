<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $installment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $installment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $installment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Installments'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="installments form large-9 medium-8 columns content">
    <?= $this->Form->create($installment) ?>
    <fieldset>
        <legend><?= __('Edit Installment') ?></legend>
        <?php
            echo $this->Form->control('user_id');
            echo $this->Form->control('amount');
            echo $this->Form->control('paid');
            echo $this->Form->control('no');
            echo $this->Form->control('date');
            echo $this->Form->control('received_id');
            echo $this->Form->control('method');
            echo $this->Form->control('deadline', ['empty' => true]);
            echo $this->Form->control('balance');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
