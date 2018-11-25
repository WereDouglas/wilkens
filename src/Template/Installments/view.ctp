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

<div class="installments view large-9 medium-8 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=>$installment->user->full_name]);   ?>
        <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tenant') ?></th>
            <td><?= $installment->has('user') ? $this->Html->link($installment->user->full_name, ['controller' => 'Users', 'action' => 'view', $installment->user->id]) : '' ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Received by: ') ?></th>
            <td><?= h($installment->receiver->full_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paid') ?></th>
            <td><?= h($installment->paid) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Method') ?></th>
            <td><?= h($installment->method) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($installment->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No') ?></th>
            <td><?= $this->Number->format($installment->no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Balance') ?></th>
            <td><?= $this->Number->format($installment->balance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($installment->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deadline') ?></th>
            <td><?= h($installment->deadline) ?></td>
        </tr>
    </table>

    <?= $this->Html->link(__('Edit Installment'), ['action' => 'edit', $installment->id]) ?>
    <?= $this->Form->postLink(__('Delete Installment'), ['action' => 'delete', $installment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $installment->id)]) ?>
</div>
