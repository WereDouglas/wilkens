<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kin $kin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Kins'), ['action' => 'index']) ?></li>
        </ul>
</nav>
<div class="kins form large-9 medium-8 columns content">
    <?= $this->Form->create($kin) ?>
    <fieldset>
        <legend><?= __('Add Kin') ?></legend>
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
