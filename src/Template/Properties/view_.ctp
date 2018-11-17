<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
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
                            <li><?= $this->Html->link(__('Edit Property'), ['action' => 'edit', $property->id]) ?> </li>
                            <li><?= $this->Form->postLink(__('Delete Property'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]) ?> </li>
                            <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?> </li>
                            <li><?= $this->Html->link(__('New Property'), ['action' => 'add']) ?> </li>
                            <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
                            <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>

                        </ul>
                    </li>
                </ul>
            </div>

            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="properties view large-9 medium-8 columns content">
                            <h3><?= h($property->name) ?></h3>
                            <table class="vertical-table">
                                <tr>
                                    <th scope="row"><?= __('Id') ?></th>
                                    <td><?= h($property->id) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Name') ?></th>
                                    <td><?= h($property->name) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Manager Id') ?></th>
                                    <td><?= h($property->manager_id) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Legal Id') ?></th>
                                    <td><?= h($property->legal_id) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Terms') ?></th>
                                    <td><?= h($property->terms) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Location') ?></th>
                                    <td><?= h($property->location) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Category') ?></th>
                                    <td><?= h($property->category) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Client') ?></th>
                                    <td><?= $property->has('client') ? $this->Html->link($property->client->id, ['controller' => 'Clients', 'action' => 'view', $property->client->id]) : '' ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('No Of Rooms') ?></th>
                                    <td><?= $this->Number->format($property->no_of_rooms) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Lng') ?></th>
                                    <td><?= $this->Number->format($property->lng) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Lat') ?></th>
                                    <td><?= $this->Number->format($property->lat) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Commission') ?></th>
                                    <td><?= $this->Number->format($property->commission) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Created At') ?></th>
                                    <td><?= h($property->created_at) ?></td>
                                </tr>
                            </table>
                            <div class="row">
                                <h4><?= __('Details') ?></h4>
                                <?= $this->Text->autoParagraph(h($property->details)); ?>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

