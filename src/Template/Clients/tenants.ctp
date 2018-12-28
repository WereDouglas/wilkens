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
<div class="rents index large-12 medium-12 columns content table-responsive">

    <button class="btn btn-default" onclick="printDiv('printableArea')">
        <i class="fa fa-print" aria-hidden="true" style="font-size: 17px;"> Print</i>
    </button>
    <div class="print" id="printableArea" >
            <div class="related">

            <?php if (!empty($tenancy)): ?>
                <?php
                $result = array();
                foreach ($tenancy as $element) {
                    $result[$element['property_name']][] = $element;
                }
                ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>

                        <th scope="col" colspan="5"><h4><?= __('Tenancy status') ?></h4></th>

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
                            <td colspan="5"><span class="groups"><?= $key ?></span></td>
                        </tr>
                        <?php foreach ($value as $key2 => $value2):
                            $error = '';
                            if (strtotime($value2->tenancy_end) > strtotime($end_date)) {
                                $color = '#1ABC9C';//green
                            } else {
                                if (strtotime($value2->tenancy_end) < strtotime($start_date)) {
                                    $color = '#FF0000';//red
                                    $error = '<div class="demo-google-material-icon"> <i class="material-icons col-red">report</i> </div>';
                                } else {
                                    if (strtotime($value2->tenancy_start) >= strtotime($start_date) && strtotime($value2->tenancy_end) <= strtotime($end_date)) {
                                        $color = '#5C007A';//red
                                    } else {
                                        $color = '#2B2B2B';//gray
                                    }
                                }
                            }
                            ?>
                            <tr>
                                <td color="<?= $color ?>"><?= $value2['room'] ?></td>
                                <td><font
                                        color="<?= $color ?>"><?= $value2['first_name'] . ' ' . $value2['last_name'] ?></font>
                                </td>
                                <td><?= $this->Number->format($value2['cost']) ?></td>
                                <td><?= date('d-M-y', strtotime($value2->tenancy_start)) ?></td>
                                <td><?= date('d-M-y', strtotime($value2->tenancy_end)) ?></td>
                                <td><?php echo $error; ?></td>

                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
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
