<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
$links_array = [
    ['List Clients', ['action' => 'index']],
    ['List Users', ['controller' => 'Users', 'action' => 'index']],
    ['New User', ['controller' => 'Users', 'action' => 'add']],

];
$active = ['yes', 'no'];
?>

<div class="clients form large-9 medium-8 columns content">
    <?= $this->Element('nav', ['links' => $links_array, 'title' => 'Edit Client']); ?>
    <?= $this->Form->create($client) ?>
    <fieldset>

        <?php
        echo $this->Form->control('commission');
        echo $this->Form->control('contract');
        echo $this->Form->control('start_date');
        echo $this->Form->control('end_date', ['empty' => true]);
        echo $this->Form->control('active', ['options' => $active]);
        echo $this->Form->control('payment_terms');
        echo $this->Form->control('code');
        echo $this->Form->control('delivery_method');
        echo $this->Form->control('created_at');
        echo $this->Form->control('user_id');
        echo $this->Form->control('last_banked', ['empty' => true]);
        echo $this->Form->control('manager_id', ['options' => $users, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
