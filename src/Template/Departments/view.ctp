<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Department $department
 */
$links_array = [
    ['Add Departments', ['action' => 'add']],
    ['List Departments', ['action' => 'index']],
    ['List Companies', ['controller' => 'Companies', 'action' => 'index']],
];
?>
<div class="departments view large-9 medium-8 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=>$department->name]);   ?>

    <table class="vertical-table">

        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($department->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= $department->has('company') ? $this->Html->link($department->company->name, ['controller' => 'Companies', 'action' => 'view', $department->company->id]) : '' ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Employees') ?></h4>
        <?php if (!empty($department->employees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>

                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Company Id') ?></th>
                <th scope="col"><?= __('Branch Id') ?></th>
                <th scope="col"><?= __('Department Id') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('No') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($department->employees as $employees): ?>
            <tr>

                <td><?= h($employees->user_id) ?></td>
                <td><?= h($employees->company_id) ?></td>
                <td><?= h($employees->branch_id) ?></td>
                <td><?= h($employees->department_id) ?></td>
                <td><?= h($employees->start_date) ?></td>
                <td><?= h($employees->end_date) ?></td>
                <td><?= h($employees->active) ?></td>
                <td><?= h($employees->address) ?></td>
                <td><?= h($employees->no) ?></td>
                <td><?= h($employees->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Employees', 'action' => 'view', $employees->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Employees', 'action' => 'edit', $employees->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Employees', 'action' => 'delete', $employees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employees->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <li><?= $this->Html->link(__('Edit Department'), ['action' => 'edit', $department->id]) ?> </li>
    <li><?= $this->Form->postLink(__('Delete Department'), ['action' => 'delete', $department->id], ['confirm' => __('Are you sure you want to delete # {0}?', $department->id)]) ?> </li>

</div>
