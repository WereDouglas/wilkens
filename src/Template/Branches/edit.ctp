<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Branch $branch
 */
$links_array = [
    ['List Branches', ['action' => 'index']],
    ['List Companies', ['controller' => 'Companies', 'action' => 'index']],
    ['New Company', ['controller' => 'Companies', 'action' => 'add']],
    ['New Employee', ['controller' => 'Employees', 'action' => 'add']]


];
?>
s="branches form large-9 medium-8 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=>'Edit Branch']);   ?>
    <?= $this->Form->create($branch) ?>
    <fieldset>

        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('company_id', ['options' => $companies]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
