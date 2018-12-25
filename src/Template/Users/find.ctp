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
<?= $this->Html->css('bootstrap-select.css') ?>
<?= $this->element('tableCss') ?>

<style>

    .groups {
        font-weight: bold;
        padding: 5px;
        color: #2B2B2B;
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


    <div class="rents index large-12 medium-12 columns content table-responsive">

        <button class="btn btn-default" onclick="printDiv('printableArea')">
            <i class="fa fa-print" aria-hidden="true" style="font-size: 17px;"> Print</i>
        </button>
        <div class="print" id="printableArea" style="display:block;">

            <div class="related">
                <?php

                if (!empty($tenants)):
                    $result = array();
                    foreach ($tenants as $element) {
                        $result[$element['property_name']][] = $element;
                    }
                    ?>
                    <table cellpadding="0" cellspacing="0"
                           class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <tr>

                            <th scope="col" colspan="6"><h4><?= __($client->full_name, ' Tenancy status') ?></h4></th>

                        </tr>
                        <tr>
                            <th scope="col"><?= __('H/N') ?></th>
                            <th scope="col"><?= __('Tenant name') ?></th>
                            <th scope="col"><?= __('Ag.Amount /Month') ?></th>
                            <th scope="col"><?= __('From') ?></th>
                            <th scope="col"><?= __('To') ?></th>
                            <td></td>
                        </tr>
                        <?php foreach ($result as $key => $value): ?>
                            <tr>
                                <td colspan="6"><span class="groups"><?= $key ?></span></td>
                            </tr>
                            <?php foreach ($value as $key2 => $value2): ?>
                                <tr>
                                    <td><?= $value2['room'] ?></td>
                                    <td><?= $value2['first_name'] . ' ' . $value2['last_name'] ?></font>
                                    </td>
                                    <td><?= $this->Number->format($value2['cost']) ?></td>
                                    <td><?= date('d-M-y', strtotime($value2->start_date)) ?></td>
                                    <td><?= date('d-M-y', strtotime($value2->end_date)) ?></td>
                                    <td></td>

                                </tr>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </div>
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
