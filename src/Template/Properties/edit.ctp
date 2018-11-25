<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 */
?>

<div class="properties form large-9 medium-8 columns content">
    <div class="properties index large-12 medium-12 columns content">
        <div class="header medium-3">
            <ul class="header-dropdown m-r--5">
                <h3>
                    <li class="dropdown">
                        <?= h($property->name) ?>
                        <a href="javascript:void(0);" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">

                            <li><?= $this->Form->postLink(
                                    __('Delete'),
                                    ['action' => 'delete', $property->id],
                                    ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]
                                )
                                ?></li>
                            <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
                            <li><?= $this->Html->link(__('List Requisitions'), ['controller' => 'Requisitions', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('New Requisition'), ['controller' => 'Requisitions', 'action' => 'add']) ?></li>
                            <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>
                        </ul>
                    </li>
                </h3>
            </ul>
        </div>
    <?= $this->Form->create($property) ?>
    <fieldset>
        <legend><?= __('Edit Property') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('details');
            echo $this->Form->control('no_of_rooms');
            echo $this->Form->control('manager_id', ['options' => $users]);
            echo $this->Form->control('legal_id', ['options' => $users]);
            echo $this->Form->control('terms');
            echo $this->Form->control('location');
            echo $this->Form->control('category');
            echo $this->Form->control('lng');
            echo $this->Form->control('lat');
            echo $this->Form->control('created_at');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
