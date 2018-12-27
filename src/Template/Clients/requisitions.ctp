<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requisition[]|\Cake\Collection\CollectionInterface $requisitions
 */
$links_array = [

    ['List Requisitions', ['controller' => 'Requisitions', 'action' => 'index']],
    ['New Requisition', ['controller' => 'Requisitions', 'action' => 'add']],
];
?>
<?= $this->Html->css('bootstrap-select.css') ?>
<?= $this->element('tableCss') ?>
<style>
    .totals {

        text-decoration: underline;
        text-decoration-color: #1E4666;
        font-weight: 900;
        padding: 10px;
    }

    .sub-totals {

        font-weight: 800;
        padding: 5px;
        color: #4e4e4e;
    }

    .groups {
        font-weight: bold;
        padding: 5px;
        color: #2B2B2B;
    }

    .inner-table {
        background: #fff;

        margin-bottom: 1.25rem;
        table-layout: auto;
        float: right;
        width: 60%;
        height:100px;//fixed width
    }

    .inner-table tr th, tr td {
        color: #222;
        font-size: 0.975rem;

        text-align: left;

    }
    .inner-table table  td {
        text-align: left;
        width: 10%;
        background-color: #2B2B2B;
    }
   table thead tr{

    }

    table th,table td{
        width:600px;//fixed width

    }
    .parent-thead{

        display:block;

    }
    .parent-tr{


        display:block;
    }



    .inner-tbody{
        display:block;
        height:auto;
        overflow:auto;//set tbody to auto
    }

    .parent-tbody{
        display:block;
        height:600px;
        overflow:auto;//set tbody to auto
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
                            <?php echo $this->Form->input('start_date', array(
                                'div' => 'form-line',
                                'class' => 'datepicker form-control',
                                'label' => 'Please choose a start date...',
                                'value' => date('l F Y')
                            )); ?>

                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <?php echo $this->Form->input('end_date', array(
                                'div' => 'form-line',
                                'class' => 'datepicker form-control',
                                'label' => 'Please choose an end date...',
                                'value' => date('l F Y')
                            )); ?>

                        </div>
                    </div>
                    <div class="col-sm-3">git
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

<div class="requisitions index large-12 medium-12 columns content">

    <?php
    $sum_all = 0;

    $this->Element('nav',['links'=>$links_array,'title'=>'Requisitions']);   ?>
    <table cellpadding="0" cellspacing="0" class="table-responsive parent-table par" >
        <thead class="parent-thead">
        <tr class="parent-tr">
            <th class="hidden" scope="col"><?='id' ?></th>
            <th scope="col"><?= 'Details' ?></th>
            <th scope="col"><?= 'Date' ?></th>
            <th scope="col"><?= 'No.' ?></th>
            <th scope="col"><?= 'Approved' ?></th>
            <th scope="col"><?= 'Approved by' ?></th>
            <th scope="col"><?= 'Paid' ?></th>
            <th scope="col"><?= 'Paid by' ?></th>
            <th scope="col"><?= 'Method' ?></th>
            <th scope="col"><?= 'Repaired' ?></th>
            <th scope="col"><?= 'Requested by' ?></th>
            <th scope="col"><?= 'Category' ?></th>
            <th scope="col"><?= 'Created at' ?></th>
            <th scope="col"><?= 'Client' ?></th>
            <th scope="col"><?= 'property' ?></th>
            <th scope="col"><?= 'Unit/Room' ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody class="parent-table parent-tbody">
        <?php foreach ($requisitions as $requisition):

            $approved =  ($requisition->approved==='yes')?'<div class="demo-google-material-icon"> <i class="material-icons col-green">transfer_within_a_station</i> </div>':'<div class="demo-google-material-icon"> <i class="material-icons col-red">transfer_within_a_station</i> </div>';
            $paid =  ($requisition->approved==='yes')?'<div class="demo-google-material-icon"> <i class="material-icons col-green">check</i> </div>':'<div class="demo-google-material-icon"> <i class="material-icons col-red">check</i> </div>';
            $repaired =($requisition->approved==='yes')?'<div class="demo-google-material-icon"> <i class="material-icons col-green">report</i> </div>':'<div class="demo-google-material-icon"> <i class="material-icons col-red">report</i> </div>';

            ?>
            <tr>
                <td class="hidden"><?= h($requisition->id) ?></td>
                <td ><?= h($requisition->details) ?></td>
                <td><?=date('d-M-y', strtotime($requisition->date)) ?></td>
                <td><?= $this->Number->format($requisition->no) ?></td>
                <td><?= h($requisition->approved) ?><?php echo $approved; ?></td>
                <td><?= h($requisition->approver->full_name) ?></td>
                <td><?= h($requisition->paid) ?><?php echo $paid; ?></td>
                <td><?= h($requisition->paider->full_name) ?></td>
                <td><?= h($requisition->method) ?></td>
                <td><?= h($requisition->repaired) ?><?php echo $repaired; ?></td>
                <td><?= h($requisition->requested->full_name) ?></td>
                <td><?= h($requisition->category) ?></td>
                <td><?= h($requisition->created_at) ?></td>
                <td><?= $requisition->has('user') ? $this->Html->link($requisition->user->full_name, ['controller' => 'Users', 'action' => 'view', $requisition->user->id]) : '' ?></td>
                <td><?= $requisition->has('property') ? $this->Html->link($requisition->property->name, ['controller' => 'Properties', 'action' => 'view', $requisition->property->id]) : '' ?></td>
                <td><?= $requisition->has('unit') ? $this->Html->link($requisition->unit->name, ['controller' => 'Units', 'action' => 'view', $requisition->unit->id]) : '' ?></td>

                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requisition->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requisition->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requisition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requisition->id)]) ?>
                </td>
                <td><?= h($requisition->created_at) ?></td>
            </tr>
            <tr>
                <td colspan="17">
                    <table cellpadding="0" cellspacing="0" class="inner-table" >
                        <thead>
                        <tr>
                            <th scope="col" colspan="9">Expenses</th>
                        </tr>

                        </thead>
                        <tbody class="inner-tbody" >
                        <tr>

                            <td scope="col">Particular</td>
                            <td scope="col">Qty</td>
                            <td scope="col">Cost</td>
                            <td scope="col">Total</td>
                            <td scope="col">editable</td>
                            <td scope="col" class="actions"><?= __('Actions') ?></td>
                        </tr>
                        <?php
                        $sum = 0;
                        foreach ($requisition->expenses as $expense):
                            $sum +=$expense->total;
                            $sum_all +=$expense->total;
                            ?>
                            <tr>

                                <td><?= h($expense->item) ?></td>
                                <td><?= $this->Number->format($expense->qty) ?></td>
                                <td><?= $this->Number->format($expense->cost) ?></td>
                                <td><?= $this->Number->format($expense->total) ?></td>
                                 <td><?= h($expense->editable) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller'=>'expenses','action' => 'view', $expense->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller'=>'expenses','action' => 'edit', $expense->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller'=>'expenses','action' => 'delete', $expense->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expense->id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>

                            <th scope="col"></th>
                            <th scope="col">Total</th>
                            <th scope="col"><?= $this->Number->format($sum) ?></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </tbody>
                    </table>
                </td>

            </tr>
        <?php endforeach; ?>
        <tr>
            <th class="hidden" scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">TOTAL</th>

            <th scope="col" class="actions"><?= $this->Number->format($sum_all) ?></th>
        </tr>
        </tbody>
    </table>

</div>
<?= $this->element('tableScripts') ?>
<?= $this->Html->script([
    'jquery.min',
    'bootstrap',
    'bootstrap-select',
    'jquery.slimscroll',
    'waves',
    'admin',
    'demo',
    'autosize.js',
    'moment.js',
    'bootstrap-material-datetimepicker.js',
    'basic-form-elements.js',
    'jquery.tabledit.js'
]); ?>

<script>
    $('#editable-table').Tabledit({
        url: 'example.php',
        columns: {
            identifier: [0, 'id'],
            editable: [[1, 'col1'], [2, 'col1'], [3, 'col3']]
        }
    });



</script>
