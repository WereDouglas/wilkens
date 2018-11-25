<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Unit $unit
 */
?>
<?=$this->Html->css('base.css')?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        </ul>
</nav>
<div class="units form large-9 medium-8 columns content">
    <div class="header medium-1">
        <ul class="header-dropdown m-r--5">

            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle " data-toggle="dropdown" role="button"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">more_vert</i>

                </a>
                <ul class="dropdown-menu pull-right">

                    <li><?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $unit->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $unit->id)]
                        )
                        ?></li>
                    <li><?= $this->Html->link(__('List Units'), ['action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Rents'), ['controller' => 'Rents', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Rent'), ['controller' => 'Rents', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Requisitions'), ['controller' => 'Requisitions', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Requisition'), ['controller' => 'Requisitions', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?></li>
                </ul>
            </li>
        </ul>
    </div>
    <?= $this->Form->create($unit) ?>
    <fieldset>
        <legend><?= __('Edit Unit') ?></legend>
        <?php
            echo $this->Form->control('types');
            echo $this->Form->control('name');
            echo $this->Form->control('states');
            echo $this->Form->control('occupied');
            echo $this->Form->control('cost');
            echo $this->Form->control('description');
            echo $this->Form->control('rooms');
            echo $this->Form->control('property_id', ['options' => $properties]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('tenants._ids', ['options' => $tenants]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
