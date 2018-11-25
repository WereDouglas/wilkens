<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rent $rent
 */
$links_array = [
    ['List Rents', ['action' => 'index']],
    ['List Penalties', ['controller' => 'Penalties', 'action' => 'index']],
    ['List Users', ['controller' => 'Users', 'action' => 'index']]
];
$active =['yes','no'];
?>

<div class="rents form large-9 medium-8 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=>'Add Rent']);   ?>
    <?= $this->Form->create($rent) ?>
    <fieldset>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('method');
            echo $this->Form->control('no');
            echo $this->Form->control('total_cost');
            echo $this->Form->control('total_paid');
            echo $this->Form->control('for_client');
            echo $this->Form->control('percentage_used');
            echo $this->Form->control('for_commission');
            echo $this->Form->control('paid_to_client');
            echo $this->Form->control('start_date');
            echo $this->Form->control('end_date');
            echo $this->Form->control('unpaid_months');
            echo $this->Form->control('paid_months');
            echo $this->Form->control('vat');
            echo $this->Form->control('balance');
            echo $this->Form->control('branch_id', ['options' => $branches, 'empty' => true]);
            echo $this->Form->control('cheque_no');
            echo $this->Form->control('receive_id');
            echo $this->Form->control('editable',['options'=>$active]);
            echo $this->Form->control('created_at');
            echo $this->Form->control('landlord_id');
            echo $this->Form->control('deposit_id', ['options' => $deposits, 'empty' => true]);
            echo $this->Form->control('occupant_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
