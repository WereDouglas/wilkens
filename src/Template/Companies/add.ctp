<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */
$links_array = [
    ['List Companies', ['action' => 'index']],
    ['New Company', ['action' => 'add']],
    ['List Branches', ['controller' => 'Branches', 'action' => 'index']],
    ['New Branch', ['controller' => 'Branches', 'action' => 'add']]
];
?>

<div class="companies form large-9 medium-8 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=>'Add Company']); ?>

    <?= $this->Form->create($company,['type'=>'file']) ?>
    <fieldset>

        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('address');
            echo $this->Form->control('photo');
            echo $this->Form->control('photo_dir');
            echo $this->Form->control('photo_size');
            echo $this->Form->control('photo_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
