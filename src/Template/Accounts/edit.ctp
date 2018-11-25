<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Account $account
 */
$links_array = [
    ['List Accounts', ['action' => 'index']],
    ['List Users', ['controller' => 'Users', 'action' => 'index']],
    ['New User', ['controller' => 'Users', 'action' => 'add']],
    ['List Deposits', ['controller' => 'Deposits', 'action' => 'index']],
    ['New Deposit', ['controller' => 'Deposits', 'action' => 'add']]

];
$types = ['Primary','Secondary'];
?>

<div class="accounts form large-9 medium-8 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=>'Edit Account']);   ?>

    <?= $this->Form->create($account) ?>
    <fieldset>

        <?php
            echo $this->Form->control('no');
        echo $this->Form->control('type',['options'=>$types]);
            echo $this->Form->control('account_name');
            echo $this->Form->control('bank_name');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
