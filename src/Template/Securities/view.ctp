<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Security $security
 */
$links_array = [
    ['List Securities', ['action' => 'index']],
    ['List Users', ['controller' => 'Users', 'action' => 'index']]
];
?>

<div class="securities view large-9 medium-8 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=>h($security->id)]);   ?>

    <table class="vertical-table table">
        <tr>
            <th scope="row"><?= __('Tenant') ?></th>
            <td><?= $security->has('user') ? $this->Html->link($security->user->full_name, ['controller' => 'Users', 'action' => 'view', $security->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Method') ?></th>
            <td><?= h($security->method) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paid Back') ?></th>
            <td><?= h($security->paid_back) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved') ?></th>
            <td><?= h($security->approved) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requested Id') ?></th>
            <td><?= h($security->requester->full_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved Id') ?></th>
            <td><?= h($security->approver->full_name) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($security->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($security->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Refunded') ?></th>
            <td><?= $this->Number->format($security->refunded) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($security->date) ?></td>
        </tr>
    </table>
    <?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $security->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $security->id)]
    )
    ?>
</div>
