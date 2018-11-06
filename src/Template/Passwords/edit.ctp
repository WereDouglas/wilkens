<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Password $password
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $password->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $password->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Passwords'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="passwords form large-9 medium-8 columns content">
    <?= $this->Form->create($password) ?>
    <fieldset>
        <legend><?= __('Edit Password') ?></legend>
        <?php
            echo $this->Form->control('password');
            echo $this->Form->control('created_at');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
