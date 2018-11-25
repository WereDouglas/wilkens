<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property[]|\Cake\Collection\CollectionInterface $properties
 */
?>

<?= $this->element('tableCss') ?>
<div class="properties index large-12 medium-12 columns content">
    <div class="header medium-3">
        <ul class="header-dropdown m-r--5">
            <h3>
            <li class="dropdown">
               <?= __('Properties') ?>
                <a href="javascript:void(0);" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                    <i class="material-icons">more_vert</i>
                </a>
                <ul class="dropdown-menu pull-right">

                    <li><?= $this->Html->link(__('New Property'), ['action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Requisitions'), ['controller' => 'Requisitions', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Requisition'), ['controller' => 'Requisitions', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>
                </ul>
            </li>
            </h3>
        </ul>
    </div>
    <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-hover dataTable js-exportable">
        <thead>
            <tr>
                <th class="hide" scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no_of_rooms') ?></th>
                <th scope="col"><?= $this->Paginator->sort('manager_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('legal_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('terms') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lng') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lat') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>

                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($properties as $property): ?>
            <tr>
                <td class="hide"><?= h($property->id) ?></td>
                <td><?= h($property->name) ?></td>
                <td><?= $property->has('user') ? $this->Html->link($property->user->full_name, ['controller' => 'Users', 'action' => 'view', $property->user->id]) : '' ?></td>

                <td><?= $this->Number->format($property->no_of_rooms) ?></td>
                <td><?= h($property->manager->full_name) ?></td>
                <td><?= h($property->legal->full_name) ?></td>
                <td><?= h($property->terms) ?></td>
                <td><?= h($property->location) ?></td>
                <td><?= h($property->category) ?></td>
                <td><?= $this->Number->format($property->lng) ?></td>
                <td><?= $this->Number->format($property->lat) ?></td>
                <td><?= h($property->created_at) ?></td>
                  <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $property->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $property->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<?= $this->element('tableScripts') ?>
