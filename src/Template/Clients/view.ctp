<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
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
                            <li><?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->id]) ?> </li>
                            <li><?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?> </li>
                            <li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?> </li>
                            <li><?= $this->Html->link(__('New Client'), ['action' => 'add']) ?> </li>
                            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
                            <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>

                        </ul>
                    </li>
                </ul>
            </div>

            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="clients view large-9 medium-8 columns content">
                            <h3><?= h($client->id) ?></h3>
                            <table class="vertical-table">
                                <tr>
                                    <th scope="row"><?= __('Id') ?></th>
                                    <td><?= h($client->id) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Active') ?></th>
                                    <td><?= h($client->active) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Payment Terms') ?></th>
                                    <td><?= h($client->payment_terms) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Code') ?></th>
                                    <td><?= h($client->code) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Delivery Method') ?></th>
                                    <td><?= h($client->delivery_method) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('User') ?></th>
                                    <td><?= $client->has('user') ? $this->Html->link($client->user->first_name, ['controller' => 'Users', 'action' => 'view', $client->user->id]) : '' ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Commission') ?></th>
                                    <td><?= $this->Number->format($client->commission) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Contract') ?></th>
                                    <td><?= $this->Number->format($client->contract) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Start Date') ?></th>
                                    <td><?= h($client->start_date) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('End Date') ?></th>
                                    <td><?= h($client->end_date) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Created At') ?></th>
                                    <td><?= h($client->created_at) ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

