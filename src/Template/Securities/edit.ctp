<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Security $security
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $security->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $security->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Securities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="securities form large-9 medium-8 columns content">
    <?= $this->Form->create($security) ?>
    <fieldset>
        <legend><?= __('Edit Security') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('amount');
            echo $this->Form->control('method');
            echo $this->Form->control('paid_back');
            echo $this->Form->control('approved');
            echo $this->Form->control('requested_by');
            echo $this->Form->control('approved_by');
            echo $this->Form->control('refunded');
            echo $this->Form->control('no');
            echo $this->Form->control('tenant_id', ['options' => $tenants]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
