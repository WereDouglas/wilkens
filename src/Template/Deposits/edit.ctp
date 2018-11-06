<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Deposit $deposit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $deposit->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $deposit->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Deposits'), ['action' => 'index']) ?></li>
        </ul>
</nav>
<div class="deposits form large-9 medium-8 columns content">
    <?= $this->Form->create($deposit) ?>
    <fieldset>
        <legend><?= __('Edit Deposit') ?></legend>
        <?php
            echo $this->Form->control('rent_amount');
            echo $this->Form->control('expense_amount');
            echo $this->Form->control('method');
            echo $this->Form->control('date');
            echo $this->Form->control('prepared_by');
            echo $this->Form->control('approved_by');
            echo $this->Form->control('deposited_by');
            echo $this->Form->control('remarks');
            echo $this->Form->control('complete');
            echo $this->Form->control('created_at');
            echo $this->Form->control('account_id', ['options' => $accounts]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
