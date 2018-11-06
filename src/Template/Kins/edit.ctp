<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kin $kin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $kin->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $kin->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Kins'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="kins form large-9 medium-8 columns content">
    <?= $this->Form->create($kin) ?>
    <fieldset>
        <legend><?= __('Edit Kin') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('contact');
            echo $this->Form->control('email');
            echo $this->Form->control('photo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
