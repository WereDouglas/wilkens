<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 */
?>

<div class="properties view large-9 medium-8 columns content">
    <div class="properties index large-12 medium-12 columns content">
        <div class="header medium-3">
            <ul class="header-dropdown m-r--5">
                <h3>
                    <li class="dropdown">
                        <?= h($property->name) ?>
                        <a href="javascript:void(0);" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">

                            <li class="heading"><?= __('Actions') ?></li>
                            <li><?= $this->Html->link(__('Edit Property'), ['action' => 'edit', $property->id]) ?> </li>
                            <li><?= $this->Form->postLink(__('Delete Property'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]) ?> </li>
                            <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?> </li>
                            <li><?= $this->Html->link(__('New Property'), ['action' => 'add']) ?> </li>
                            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
                            <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
                            <li><?= $this->Html->link(__('List Requisitions'), ['controller' => 'Requisitions', 'action' => 'index']) ?> </li>
                            <li><?= $this->Html->link(__('New Requisition'), ['controller' => 'Requisitions', 'action' => 'add']) ?> </li>
                            <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?> </li>
                            <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?> </li>
                        </ul>
                    </li>
                </h3>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#home_animation_2" data-toggle="tab">START</a></li>
                <li role="presentation"><a href="#profile_animation_2" data-toggle="tab">REQUISITIONS</a></li>
                <li role="presentation"><a href="#messages_animation_2" data-toggle="tab">ROOMS/UNITS</a></li>
                </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane animated fadeInRight active" id="home_animation_2">
                    <b>PROFILE</b>
                    <div class="row">
                        <h4><?= __('Details') ?></h4>
                        <?= $this->Text->autoParagraph(h($property->details)); ?>
                    </div>
                    <table class="vertical-table">

                        <tr>
                            <th scope="row"><?= __('Name') ?></th>
                            <td><?= h($property->name) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Manager Id') ?></th>
                            <td><?= h($property->manager->full_name) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Legal Id') ?></th>
                            <td><?= h($property->legal->full_name) ?></td>
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
                            <th scope="row"><?= __('User') ?></th>
                            <td><?= $property->has('user') ? $this->Html->link($property->user->first_name, ['controller' => 'Users', 'action' => 'view', $property->user->id]) : '' ?></td>
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
                            <th scope="row"><?= __('Created At') ?></th>
                            <td><?= h($property->created_at) ?></td>
                        </tr>
                    </table>

                </div>
                <div role="tabpanel" class="tab-pane animated fadeInRight" id="profile_animation_2">
                    <b>REQUISITIONS</b>
                    <div class="related">
                        <h4><?= __('Related Requisitions') ?></h4>
                        <?php if (!empty($property->requisitions)): ?>
                            <table cellpadding="0" cellspacing="0">
                                <tr>
                                    <th scope="col"><?= __('Type') ?></th>
                                    <th scope="col"><?= __('Date') ?></th>
                                    <th scope="col"><?= __('Details') ?></th>
                                    <th scope="col"><?= __('No') ?></th>
                                    <th scope="col"><?= __('Remarks') ?></th>
                                    <th scope="col"><?= __('Approved') ?></th>
                                    <th scope="col"><?= __('Approved Id') ?></th>
                                    <th scope="col"><?= __('Paid') ?></th>
                                    <th scope="col"><?= __('Paid Id') ?></th>
                                    <th scope="col"><?= __('Method') ?></th>
                                    <th scope="col"><?= __('Repaired') ?></th>
                                    <th scope="col"><?= __('Requested Id') ?></th>
                                    <th scope="col"><?= __('Category') ?></th>
                                    <th scope="col"><?= __('Created At') ?></th>
                                    <th scope="col"><?= __('User Id') ?></th>
                                    <th scope="col"><?= __('Property Id') ?></th>
                                    <th scope="col"><?= __('Unit Id') ?></th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                                </tr>
                                <?php foreach ($property->requisitions as $requisitions): ?>
                                    <tr>

                                        <td><?= h($requisitions->type) ?></td>
                                        <td><?= h($requisitions->date) ?></td>
                                        <td><?= h($requisitions->details) ?></td>
                                        <td><?= h($requisitions->no) ?></td>
                                        <td><?= h($requisitions->remarks) ?></td>
                                        <td><?= h($requisitions->approved) ?></td>
                                        <td><?= h($requisitions->approved_id) ?></td>
                                        <td><?= h($requisitions->paid) ?></td>
                                        <td><?= h($requisitions->paid_id) ?></td>
                                        <td><?= h($requisitions->method) ?></td>
                                        <td><?= h($requisitions->repaired) ?></td>
                                        <td><?= h($requisitions->requested_id) ?></td>
                                        <td><?= h($requisitions->category) ?></td>
                                        <td><?= h($requisitions->created_at) ?></td>
                                        <td><?= h($requisitions->user_id) ?></td>
                                        <td><?= h($requisitions->property_id) ?></td>
                                        <td><?= h($requisitions->unit_id) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link(__('View'), ['controller' => 'Requisitions', 'action' => 'view', $requisitions->id]) ?>
                                            <?= $this->Html->link(__('Edit'), ['controller' => 'Requisitions', 'action' => 'edit', $requisitions->id]) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Requisitions', 'action' => 'delete', $requisitions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requisitions->id)]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane animated fadeInRight" id="messages_animation_2">
                    <b>UNITS/ROOMS</b>
                    <div class="related">
                        <h4><?= __('Related Units') ?></h4>
                        <?php if (!empty($property->units)): ?>
                            <table cellpadding="0" cellspacing="0">
                                <tr>

                                    <th scope="col"><?= __('Types') ?></th>
                                    <th scope="col"><?= __('Name') ?></th>
                                    <th scope="col"><?= __('States') ?></th>
                                    <th scope="col"><?= __('Occupied') ?></th>
                                    <th scope="col"><?= __('Cost') ?></th>
                                    <th scope="col"><?= __('Description') ?></th>
                                    <th scope="col"><?= __('Rooms') ?></th>

                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                                </tr>
                                <?php foreach ($property->units as $units): ?>
                                    <tr>

                                        <td><?= h($units->types) ?></td>
                                        <td><?= h($units->name) ?></td>
                                        <td><?= h($units->states) ?></td>
                                        <td><?= h($units->occupied) ?></td>
                                        <td><?= number_format($units->cost) ?></td>
                                        <td><?= h($units->description) ?></td>
                                        <td><?= h($units->rooms) ?></td>

                                        <td class="actions">
                                            <?= $this->Html->link(__('View'), ['controller' => 'Units', 'action' => 'view', $units->id]) ?>
                                            <?= $this->Html->link(__('Edit'), ['controller' => 'Units', 'action' => 'edit', $units->id]) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Units', 'action' => 'delete', $units->id], ['confirm' => __('Are you sure you want to delete # {0}?', $units->id)]) ?>
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
