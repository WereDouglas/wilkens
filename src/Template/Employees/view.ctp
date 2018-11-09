<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>


<?=$this->Html->css('base.css')?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2> DETAILS </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li class="heading"><?= __('Actions') ?></li>
                            <li><?= $this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee->id]) ?> </li>
                            <li><?= $this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?> </li>
                            <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?> </li>
                            <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?> </li>
                            <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?> </li>
                            <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?> </li>
                            <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?> </li>
                            <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?> </li>

                        </ul>
                    </li>
                </ul>
            </div>

            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="employees view large-9 medium-8 columns content">
                            <h3><?= h($employee->id) ?></h3>
                            <table class="vertical-table">
                                <tr>
                                    <th scope="row"><?= __('Id') ?></th>
                                    <td><?= h($employee->id) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('User') ?></th>
                                    <td><?= $employee->has('user') ? $this->Html->link($employee->user->first_name, ['controller' => 'Users', 'action' => 'view', $employee->user->id]) : '' ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Company') ?></th>
                                    <td><?= $employee->has('company') ? $this->Html->link($employee->company->name, ['controller' => 'Companies', 'action' => 'view', $employee->company->id]) : '' ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Branch') ?></th>
                                    <td><?= $employee->has('branch') ? $this->Html->link($employee->branch->name, ['controller' => 'Branches', 'action' => 'view', $employee->branch->id]) : '' ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Department') ?></th>
                                    <td><?= $employee->has('department') ? $this->Html->link($employee->department->name, ['controller' => 'Departments', 'action' => 'view', $employee->department->id]) : '' ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Start Date') ?></th>
                                    <td><?= h($employee->start_date) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('End Date') ?></th>
                                    <td><?= h($employee->end_date) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Active') ?></th>
                                    <td><?= h($employee->active) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Address') ?></th>
                                    <td><?= h($employee->address) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('No') ?></th>
                                    <td><?= h($employee->no) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Created At') ?></th>
                                    <td><?= h($employee->created_at) ?></td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
