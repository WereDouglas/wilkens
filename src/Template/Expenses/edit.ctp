<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Expense $expense
 */
$links_array = [
    ['New Expense', ['action' => 'add']],
    ['List Expense', ['action' => 'view']],
    ['List Requisitions', ['controller' => 'Requisitions', 'action' => 'index']],
    ['New Requisition', ['controller' => 'Requisitions', 'action' => 'add']],
];
$edit = ['yes','no'];
?>
<div class="expenses form large-9 medium-8 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=>'Edit Expenses']);   ?>
    <?= $this->Form->create($expense) ?>
    <fieldset>

        <?php
            echo $this->Form->control('item');
            echo $this->Form->control('qty');
            echo $this->Form->control('cost');
            echo $this->Form->control('total');
            echo $this->Form->control('created_at');
            echo $this->Form->control('requisition_id', ['options' => $requisitions]);
            echo $this->Form->control('editable',['options'=>$edit]);
            echo $this->Form->control('no');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $expense->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $expense->id)]
    )
    ?>
</div>
