<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requisition $requisition
 */
$links_array = [

    ['List Requisitions', ['controller' => 'Requisitions', 'action' => 'index']],
    ['New Requisition', ['controller' => 'Requisitions', 'action' => 'add']],
];
$edit = ['yes', 'no'];
?>
<div class="requisitions form large-9 medium-8 columns content">
    <?= $this->Element('nav', ['links' => $links_array, 'title' => 'Add Requisition']); ?>
    <?= $this->Form->create($requisition) ?>
    <fieldset>
        <?php
        echo $this->Form->control('type');
        echo $this->Form->control('date');
        echo $this->Form->control('details');
        echo $this->Form->control('no');
        echo $this->Form->control('remarks');
        echo $this->Form->control('approved', ['options' => $edit]);
        echo $this->Form->control('approved_id');
        echo $this->Form->control('paid');
        echo $this->Form->control('paid_id');
        echo $this->Form->control('method');
        echo $this->Form->control('repaired', ['options' => $edit]);
        echo $this->Form->control('requested_id');
        echo $this->Form->control('category');
        echo $this->Form->control('created_at');
        echo $this->Form->control('user_id', ['options' => $users]);
        echo $this->Form->control('property_id', ['options' => $properties, 'empty' => true]);
        echo $this->Form->control('unit_id', ['options' => $units, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
