<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rent[]|\Cake\Collection\CollectionInterface $rents
 */
$links_array = [
    ['List Rents', ['action' => 'index']],
    ['List Penalties', ['controller' => 'Penalties', 'action' => 'index']],
    ['List Users', ['controller' => 'Users', 'action' => 'index']]
];
?>
<?=$this->Html->css('bootstrap-select.css') ?>
<?= $this->element('tableCss') ?>
<style>

    tr.group,
    tr.group:hover {
        background-color: #ddd !important;
    }
</style>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            Generate
            <?php echo $this->Form->create('report', array(
                'inputDefaults' => array(
                    'div' => 'form-group',
                    'label' => false,
                    'wrapInput' => false,
                    'class' => 'form-control'
                ),

            )); ?>
            <div class="body">
            <div class="row clearfix ">

                <div class="col-sm-3">
                    <div class="form-group">
                        <select class="form-control show-tick" id ="user_id" name ="user_id">
                            <?php foreach ($users as $user): ?>
                                <option value="<?= $user->id; ?>"><?= $user->full_name; ?></option>

                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <?php echo $this->Form->input('start_date', array(
                            'div' => 'form-line',
                            'class' => 'datepicker form-control',
                            'label' => 'Please choose a start date...'
                        )); ?>

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?php echo $this->Form->input('end_date', array(
                            'div' => 'form-line',
                            'class' => 'datepicker form-control',
                            'label' => 'Please choose an end date...'
                        )); ?>

                    </div>
                </div>
                <div class="col-sm-3">
                    <?php echo $this->Form->submit('GENERATE', array(
                        'div' => 'form-group',
                        'class' => 'btn btn-success btn-lg m-l-15 waves-effect'
                    )); ?>


                </div>
            </div>
            <?php echo $this->Form->end(); ?>

        </div>


        </div>
    </div>
</div>


<div class="rents index large-12 medium-12 columns content">
    <?= $this->Element('nav', ['links' => $links_array, 'title' => 'Rent Report']); ?>


    <table cellpadding="0" cellspacing="0"
           class="table table-bordered table-striped table-hover dataTable js-exportable">
        <thead>
        <tr>
            <th scope="col"><?= 'date' ?></th>
            <th scope="col"><?= 'Tenant' ?></th>
            <th scope="col"><?= 'method' ?></th>
            <th scope="col"><?= 'no' ?></th>
            <th scope="col"><?= 'total cost' ?></th>
            <th scope="col"><?= 'total paid' ?></th>
            <th scope="col"><?= 'for client' ?></th>
            <th scope="col"><?= '% used' ?></th>
            <th scope="col"><?= ' commission' ?></th>
            <th scope="col"><?= 'paid to client' ?></th>
            <th scope="col"><?= 'start date' ?></th>
            <th scope="col"><?= h('end date') ?></th>
            <th scope="col"><?= 'unpaid months' ?></th>
            <th scope="col"><?= 'paid months' ?></th>
            <th scope="col"><?= 'vat' ?></th>
            <th scope="col"><?= 'balance' ?></th>
            <th scope="col"><?= 'branch' ?></th>
            <th scope="col"><?= 'cheque no' ?></th>
            <th scope="col"><?= 'received by' ?></th>
            <th scope="col"><?= 'editable' ?></th>
            <th scope="col"><?= 'created at' ?></th>
            <th scope="col"><?= 'Landlord/Client' ?></th>
            <th scope="col"><?= 'Deposited by' ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($rents as $rent): ?>
            <tr>
                <td><?= h($rent->date) ?></td>
                <td><?= h($rent->occupant->full_name) ?></td>
                <td><?= h($rent->method) ?></td>
                <td><?= h($rent->no) ?></td>
                <td><?= $this->Number->format($rent->total_cost) ?></td>
                <td><?= $this->Number->format($rent->total_paid) ?></td>
                <td><?= $this->Number->format($rent->for_client) ?></td>
                <td><?= $this->Number->format($rent->percentage_used) ?>%</td>
                <td><?= $this->Number->format($rent->for_commission) ?></td>
                <td><?= h($rent->paid_to_client) ?></td>
                <td><?= h($rent->start_date) ?></td>
                <td><?= h($rent->end_date) ?></td>
                <td><?= $this->Number->format($rent->unpaid_months) ?></td>
                <td><?= $this->Number->format($rent->paid_months) ?></td>
                <td><?= $this->Number->format($rent->vat) ?></td>
                <td><?= $this->Number->format($rent->balance) ?></td>
                <td><?= $rent->has('branch') ? $this->Html->link($rent->branch->name, ['controller' => 'Branches', 'action' => 'view', $rent->branch->id]) : '' ?></td>
                <td><?= h($rent->cheque_no) ?></td>
                <td><?= h($rent->receive_id) ?></td>
                <td><?= h($rent->editable) ?></td>
                <td><?= h($rent->created_at) ?></td>
                <td><?= h($rent->landlord->full_name) ?></td>
                <td><?= $rent->has('deposit') ? $this->Html->link($rent->deposit->id, ['controller' => 'Deposits', 'action' => 'view', $rent->deposit->id]) : '' ?></td>

                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rent->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rent->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rent->id)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>
<?= $this->element('tableScripts') ?>
<?= $this->Html->script(['jquery.min', 'bootstrap', 'bootstrap-select', 'jquery.slimscroll', 'waves', 'admin', 'demo', 'autosize.js', 'moment.js', 'bootstrap-material-datetimepicker.js', 'basic-form-elements.js']); ?>

