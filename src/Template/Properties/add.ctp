<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="properties form large-9 medium-8 columns content">
    <?= $this->Form->create($property) ?>
    <fieldset>
        <legend><?= __('Add Property') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('details');
            echo $this->Form->control('no_of_rooms');
            echo $this->Form->control('manager_id');
            echo $this->Form->control('legal_id');
            echo $this->Form->control('terms');
            echo $this->Form->control('location');
            echo $this->Form->control('category');
            echo $this->Form->control('lng');
            echo $this->Form->control('lat');
            echo $this->Form->control('commission');
            echo $this->Form->control('created_at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
