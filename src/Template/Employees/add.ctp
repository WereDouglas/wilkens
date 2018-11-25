<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
$links_array = [
    ['List Employees', ['action' => 'index']],
    ['List Users', ['controller' => 'Users', 'action' => 'index']],
    ['New User', ['controller' => 'Users', 'action' => 'add']],
    ['List Companies', ['controller' => 'Companies', 'action' => 'index']]

];
$active =['yes','no'];
?>

<div class="employees form large-9 medium-8 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=>'Add Employee']);   ?>
    <?= $this->Form->create($employee) ?>
    <fieldset>

        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('company_id', ['options' => $companies]);
            echo $this->Form->control('branch_id', ['options' => $branches]);
            echo $this->Form->control('department_id', ['options' => $departments]);
            echo $this->Form->control('start_date');
            echo $this->Form->control('end_date');
            echo $this->Form->control('active',['options'=>$active]);
            echo $this->Form->control('address');
            echo $this->Form->control('no');
            echo $this->Form->control('created_at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
