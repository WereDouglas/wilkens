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
$sum_total_paid = 0;
$total_cash = 0;
$expenses_sum = 0;
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
        color: #00b0e4;
    }

    table {
        background: #fff;
        border: solid 0px #ddd;
        margin-bottom: 1.25rem;
        table-layout: auto;
        float: right;
        width: 100%;
    }

    table tr th, table tr td {
        color: #222;
        font-size: 0.975rem;
        padding: 0px 2px 5px 0px;
        text-align: left;
    }
</style>
<style media="print" type="text/css">
    .print {
        background-color: white !important;
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
<div class="rents index large-12 medium-12 columns content table-responsive">
    <h1> Expense Report</h1>
    <button class="btn btn-default" onclick="printDiv('printableArea')">
        <i class="fa fa-print" aria-hidden="true" style="font-size: 17px;"> Print</i>
    </button>
    <div class="print" id="printableArea" style="display:block;">

        <div class="related">

            <?php if (!empty($requisitions)): ?>
                <?php
                $result = array();
                foreach ($requisitions as $element) {
                    $result[$element['no']][] = $element;
                }
                ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th scope="col" colspan="7">
                            <h4><h4><?= $client->full_name . ' ' . __(' Expenses from ') . date('d-M-y',
                                        strtotime($start_date)) . ' to ' . date('d-M-y', strtotime($end_date)) ?></h4></h4></h4>
                        </th>
                    </tr>
                    <tr>
                        <th scope="col"><?= __('No') ?></th>
                        <th scope="col"><?= __('Date') ?></th>
                        <th scope="col"><?= __('Details') ?></th>
                        <th scope="col"><?= __('Category') ?></th>
                        <th scope="col"><?= __('Item') ?></th>
                        <th scope="col"><?= __('Qty') ?></th>
                        <th scope="col"><?= __('Cost') ?></th>
                        <th scope="col"><?= __('Total') ?></th>

                    </tr>
                    <?php

                    $expenses_sum = 0;
                    foreach ($result as $key => $value): ?>
                        <tr>
                            <td><span class="groups"> NO :<?= $key ?></span></td>
                            <td colspan="6"></td>
                        </tr>

                        <?php

                        foreach ($value as $key2 => $reqs):
                            $expenses_sum += $reqs['total']
                            ?>
                            <tr>
                                <td></td>
                                <td><?= date('d-M-y', strtotime($reqs->date)) ?></td>

                                <td><?= h($reqs->details) ?></td>
                                <td><?= h($reqs->category) ?></td>
                                <td><?= h($reqs->item) ?></td>
                                <td><?= h($reqs->qty) ?></td>
                                <td><?= $this->Number->format($reqs['cost']) ?></td>
                                <td><?= $this->Number->format($reqs->total) ?></td>

                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>--</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>TOTAL:</td>
                        <td><span class="totals"><?= $this->Number->format($expenses_sum) ?></span></td>

                    </tr>
                </table>
            <?php endif; ?>

        </div>

        <div class="related">
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col" colspan="2"><h4>SUMMARY</h4></th>
                </tr>
                <tr>
                    <td>TOTAL EXPENSES</td>
                    <td><span class="sub-totals"><?= $this->Number->format($expenses_sum) ?></span></td>
                </tr>

            </table>
        </div>

    </div>


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
    'basic-form-elements.js'
]); ?>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
