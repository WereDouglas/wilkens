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
<div class="departments form large-9 medium-8 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=>'Edit Department']);   ?>
    <?= $this->Form->create($department) ?>
    <fieldset>
        <legend><?= __('Edit Department') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('company_id', ['options' => $companies]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $department->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $department->id)]
    )
    ?>
</div>
