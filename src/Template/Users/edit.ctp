<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$links_array = [
    ['New Expense', ['action' => 'add']],
    ['List Expenses', ['action' => 'index']],
    ['List Requisitions', ['controller' => 'Requisitions', 'action' => 'index']],
    ['New Requisition', ['controller' => 'Requisitions', 'action' => 'add']],

];

?>
<?=$this->Html->css('base.css')?>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=>'Edit User']);   ?>
    <?= $this->Form->create($user,['type'=>'file']) ?>
    <fieldset>

        <?php
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('contact');
            echo $this->Form->control('email');
            echo $this->Form->control('photo',['type'=>'file']);
            echo $this->Form->control('address');
            echo $this->Form->control('password');
            echo $this->Form->control('active');
            echo $this->Form->control('created_at');
            echo $this->Form->control('photo_dir');
            echo $this->Form->control('photo_size');
            echo $this->Form->control('photo_type');
            echo $this->Form->control('type');
            echo $this->Form->control('title');
            echo $this->Form->control('company_id', ['options' => $companies, 'empty' => true]);
            echo $this->Form->control('user_id',['options' => $users, 'empty' => true]);
            echo $this->Form->control('permissions._ids', ['options' => $permissions]);
            echo $this->Form->control('roles._ids', ['options' => $roles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
