<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    ADD ROLE
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('List Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('New Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?></li>
                            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>

                        </ul>
                    </li>
                </ul>
            </div>


            <?= $this->Form->create($role) ?>
            <?php

            $input_array = [
                ['name', ['class' => 'form-control', 'placeholder' => 'Role name']],
                ['permissions._ids', ['class' => 'form-control', 'options' => $permissions]],
                ['users._ids', ['class' => 'form-control', 'options' => $users]]
            ];
            echo $this->element('inputFields', ['array' => $input_array]);
            ?>
            <?= $this->Form->end() ?>

        </div>
    </div>
</div>
