<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Security $security
 */
$links_array = [
    ['List Securities', ['action' => 'index']],
    ['List Users', ['controller' => 'Users', 'action' => 'index']]
   ];
$active =['yes','no'];
?>
<div class="securities form large-9 medium-8 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=>'Add Security']);   ?>
    <?= $this->Form->create($security) ?>
    <fieldset>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('amount');
            echo $this->Form->control('method');
            echo $this->Form->control('paid_back');
            echo $this->Form->control('approved');
            echo $this->Form->control('requested_id');
            echo $this->Form->control('approved_id');
            echo $this->Form->control('refunded');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
