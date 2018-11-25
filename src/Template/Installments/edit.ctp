<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Installment $installment
 */
$links_array = [
    ['List Installments', ['action' => 'index']],
    ['New Installment', ['action' => 'add']]
];
?>
<div class="installments form large-9 medium-8 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=>'Edit Installment']);?>
    <?= $this->Form->create($installment) ?>
    <fieldset>

        <?php
            echo $this->Form->control('user_id');
            echo $this->Form->control('amount');
            echo $this->Form->control('paid');
            echo $this->Form->control('no');
            echo $this->Form->control('date');
            echo $this->Form->control('received_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('method');
            echo $this->Form->control('deadline', ['empty' => true]);
            echo $this->Form->control('balance');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $installment->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $installment->id)]
    )
    ?>
</div>
