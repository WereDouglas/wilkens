<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Account $account
 */
?>


<?=$this->Html->css('base.css')?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2> DETAILS </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li class="heading"><?= __('Actions') ?></li>
                            <li><?= $this->Html->link(__('Edit Account'), ['action' => 'edit', $account->id]) ?> </li>
                            <li><?= $this->Form->postLink(__('Delete Account'), ['action' => 'delete', $account->id], ['confirm' => __('Are you sure you want to delete # {0}?', $account->id)]) ?> </li>
                            <li><?= $this->Html->link(__('List Accounts'), ['action' => 'index']) ?> </li>
                            <li><?= $this->Html->link(__('New Account'), ['action' => 'add']) ?> </li>
                            <li><?= $this->Html->link(__('List Deposits'), ['controller' => 'Deposits', 'action' => 'index']) ?> </li>

                        </ul>
                    </li>
                </ul>
            </div>

            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="accounts view large-9 medium-8 columns content">
                            <h3><?= h($account->id) ?></h3>
                            <table class="vertical-table">
                                <tr>
                                    <th scope="row"><?= __('Id') ?></th>
                                    <td><?= h($account->id) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('No') ?></th>
                                    <td><?= h($account->no) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Type') ?></th>
                                    <td><?= h($account->type) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Account Name') ?></th>
                                    <td><?= h($account->account_name) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Bank Name') ?></th>
                                    <td><?= h($account->bank_name) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('User') ?></th>
                                    <td><?= $account->has('user') ? $this->Html->link($account->user->id, ['controller' => 'Users', 'action' => 'view', $account->user->id]) : '' ?></td>
                                </tr>
                            </table>
                            <div class="related">
                                <h4><?= __('Related Deposits') ?></h4>
                                <?php if (!empty($account->deposits)): ?>
                                    <table cellpadding="0" cellspacing="0">
                                        <tr>
                                            <th scope="col"><?= __('Id') ?></th>
                                            <th scope="col"><?= __('Rent Amount') ?></th>
                                            <th scope="col"><?= __('Expense Amount') ?></th>
                                            <th scope="col"><?= __('Method') ?></th>
                                            <th scope="col"><?= __('Date') ?></th>
                                            <th scope="col"><?= __('Prepared By') ?></th>
                                            <th scope="col"><?= __('Approved By') ?></th>
                                            <th scope="col"><?= __('Deposited By') ?></th>
                                            <th scope="col"><?= __('Remarks') ?></th>
                                            <th scope="col"><?= __('Complete') ?></th>
                                            <th scope="col"><?= __('Created At') ?></th>
                                            <th scope="col"><?= __('Client Id') ?></th>
                                            <th scope="col"><?= __('Account Id') ?></th>
                                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                                        </tr>
                                        <?php foreach ($account->deposits as $deposits): ?>
                                            <tr>
                                                <td><?= h($deposits->id) ?></td>
                                                <td><?= h($deposits->rent_amount) ?></td>
                                                <td><?= h($deposits->expense_amount) ?></td>
                                                <td><?= h($deposits->method) ?></td>
                                                <td><?= h($deposits->date) ?></td>
                                                <td><?= h($deposits->prepared_by) ?></td>
                                                <td><?= h($deposits->approved_by) ?></td>
                                                <td><?= h($deposits->deposited_by) ?></td>
                                                <td><?= h($deposits->remarks) ?></td>
                                                <td><?= h($deposits->complete) ?></td>
                                                <td><?= h($deposits->created_at) ?></td>
                                                <td><?= h($deposits->client_id) ?></td>
                                                <td><?= h($deposits->account_id) ?></td>
                                                <td class="actions">
                                                    <?= $this->Html->link(__('View'), ['controller' => 'Deposits', 'action' => 'view', $deposits->id]) ?>
                                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Deposits', 'action' => 'edit', $deposits->id]) ?>
                                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Deposits', 'action' => 'delete', $deposits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deposits->id)]) ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



