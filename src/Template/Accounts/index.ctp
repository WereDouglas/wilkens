<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Account[]|\Cake\Collection\CollectionInterface $accounts
 */
$links_array = [
    ['Add Account', ['action' => 'add']],
    ['List Accounts', ['action' => 'index']],
    ['List Users', ['controller' => 'Users', 'action' => 'index']],
    ['New User', ['controller' => 'Users', 'action' => 'add']],
    ['List Deposits', ['controller' => 'Deposits', 'action' => 'index']],
    ['New Deposit', ['controller' => 'Deposits', 'action' => 'add']]

];
?>
<?= $this->element('tableCss') ?>
<div class="accounts index large-12 medium-12 columns content">
    <?= $this->Element('nav', ['links' => $links_array, 'title' => 'Accounts']); ?>
    <table cellpadding="0" cellspacing="0"  class="table table-bordered table-striped table-hover dataTable js-exportable">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('no') ?></th>
            <th scope="col"><?= $this->Paginator->sort('type') ?></th>
            <th scope="col"><?= $this->Paginator->sort('account_name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('bank_name') ?></th>

            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($accounts as $account): ?>
            <tr>
                <td><?= $account->has('user') ? $this->Html->link($account->user->full_name,
                        ['controller' => 'Users', 'action' => 'view', $account->user->id]) : '' ?></td>
                <td><?= h($account->no) ?></td>
                <td><?= h($account->type) ?></td>
                <td><?= h($account->account_name) ?></td>
                <td><?= h($account->bank_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $account->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $account->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $account->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $account->id)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>
<?= $this->element('tableScripts') ?>
