<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Eviction $eviction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Eviction'), ['action' => 'edit', $eviction->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Eviction'), ['action' => 'delete', $eviction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eviction->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Evictions'), ['action' => 'index']) ?> </li>
          </ul>
</nav>
<div class="evictions view large-9 medium-8 columns content">
    <h3><?= h($eviction->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($eviction->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Evicted') ?></th>
            <td><?= h($eviction->evicted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Details') ?></th>
            <td><?= h($eviction->details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Evicted By') ?></th>
            <td><?= h($eviction->evicted_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reason') ?></th>
            <td><?= h($eviction->reason) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remarks') ?></th>
            <td><?= h($eviction->remarks) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tenant') ?></th>
            <td><?= $eviction->has('tenant') ? $this->Html->link($eviction->tenant->id, ['controller' => 'Tenants', 'action' => 'view', $eviction->tenant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Balance') ?></th>
            <td><?= $this->Number->format($eviction->balance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Costs Incurred') ?></th>
            <td><?= $this->Number->format($eviction->costs_incurred) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Repair Costs') ?></th>
            <td><?= $this->Number->format($eviction->repair_costs) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bill Costs') ?></th>
            <td><?= $this->Number->format($eviction->bill_costs) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Disposal Costs') ?></th>
            <td><?= $this->Number->format($eviction->disposal_costs) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($eviction->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Evicted On') ?></th>
            <td><?= h($eviction->evicted_on) ?></td>
        </tr>
    </table>
</div>
