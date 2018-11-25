<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tenant $tenant
 */
$links_array = [
    ['List Tenants', ['action' => 'index']],
    ['Add Tenant', ['action' => 'add']],
    ['New Users', ['controller' => 'Users', 'action' => 'view']],
    ['List Units', ['controller' => 'Units', 'action' => 'index']]
];
$active =['yes','no'];
?>

<div class="tenants form large-9 medium-8 columns content">
    <?= $this->Element('nav', ['links' => $links_array, 'title' => 'Add Tenant']); ?>
    <?= $this->Form->create($tenant) ?>
    <fieldset>

        <?php
        echo $this->Form->control('start_date');
        echo $this->Form->control('end_date');
        echo $this->Form->control('rent_start_due_day');
        echo $this->Form->control('active',['options'=>$active]);
        echo $this->Form->control('notice',['options'=>$active]);
        echo $this->Form->control('amount_to_pay');
        echo $this->Form->control('work_address');
        echo $this->Form->control('nin');
        echo $this->Form->control('passport');
        echo $this->Form->control('created_at');
        echo $this->Form->control('user_id', ['options' => $users]);
        echo $this->Form->control('units._ids', ['options' => $units]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
