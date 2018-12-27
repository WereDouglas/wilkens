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
    <?= $this->Element('nav', ['links' => $links_array, 'title' => 'Rent Report']); ?>
    <button class="btn btn-default" onclick="printDiv('printableArea')">
        <i class="fa fa-print" aria-hidden="true" style="font-size: 17px;"> Print</i>
    </button>
    <div class="print" id="printableArea" style="display:block;">
        <div class="related">
            <?php if (!empty($financials)): ?>
                <?php
                $result = array();
                foreach ($financials as $element) {
                    $result[$element['property_name']][] = $element;
                }
                ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th scope="col" colspan="12">
                            <h4><?= $client->full_name . ' ' . __('Financial Information from ') . date('d-M-y',
                                    strtotime($start_date)) . ' to ' . date('d-M-y', strtotime($end_date)) ?></h4></th>
                    </tr>
                    <tr>
                        <th scope="col"><?= __('H/N') ?></th>
                        <th scope="col"><?= __('Tenant name') ?></th>
                        <th scope="col"><?= __('Ag.Amount /Month') ?></th>
                        <th scope="col"><?= __('Payment made') ?></th>
                        <th scope="col"><?= __('Date') ?></th>
                        <th scope="col"><?= __('Month(s) paid') ?></th>
                        <th scope="col"><?= __('Security Deposit') ?></th>
                        <th scope="col"><?= __('Paid From-to') ?></th>
                        <th scope="col"><?= __('Unpaid Months') ?></th>
                        <th scope="col"><?= __('Balance') ?></th>
                        <th scope="col"><?= __('Commission') ?></th>
                        <th scope="col"><?= __('Amount Banked') ?></th>
                    </tr>
                    <?php
                    $sum_total_paid = 0;
                    $sum_security = 0;
                    $sum_balance = 0;
                    $sum_commission = 0;
                    $sum_client = 0;
                    foreach ($result as $key => $value): ?>
                        <tr>
                            <td colspan="12"><span class="groups"><?= $key ?></span></td>
                        </tr>
                        <?php
                        $property_sum_total_paid = 0;
                        $property_sum_security = 0;
                        $property_sum_balance = 0;
                        $property_sum_commission = 0;
                        $property_sum_client = 0;
                        foreach ($value as $key2 => $value2):
                            $property_sum_total_paid += $value2['total_paid'];
                            $property_sum_security += $value2['security'];
                            $property_sum_balance += $value2['balance'];
                            $property_sum_commission += $value2['for_commission'];
                            $property_sum_client += $value2['for_client'];


                            $sum_total_paid += $value2['total_paid'];
                            $sum_security += $value2['security'];
                            $sum_balance += $value2['balance'];
                            $sum_commission += $value2['for_commission'];
                            $sum_client += $value2['for_client'];


                            if (strtotime($value2->tenancy_end) > strtotime($end_date)) {
                                $color = '#26C24A';//green

                            } else {
                                if (strtotime($value2->tenancy_end) < strtotime($start_date)) {
                                    $color = '#DC4C3F';//red

                                } else {
                                    $color = '#0A0D0B';//gray

                                }
                            }
                            ?>
                            <tr>
                                <td style="color:<?= $color ?>"><?= $value2['room'] ?></td>
                                <td style="color:<?= $color ?>"><span
                                        style="color: <?= $color ?>"><?= $value2['first_name'] . ' ' . $value2['last_name'] ?></span>
                                </td>
                                <td style="color: <?= $color ?>"><?= $this->Number->format($value2['cost']) ?></td>
                                <td style="color:<?= $color ?>"><?= $this->Number->format($value2['total_paid']) ?></td>
                                <td style="color: <?= $color ?>"><?= (!empty($value2->date)) ? date('d-M-y',
                                        strtotime($value2->date)) :date('d-M-y',
                                        strtotime($value2->last_pay)); ?> </td>
                                <td style="color: <?= $color ?>"><?= $value2->paid_months ?></td>
                                <td style="color: <?= $color ?>"><?= $this->Number->format($value2->security) ?></td>
                                <td style="color: <?= $color ?>"><?= (!empty($value2->start_date)) ? date('d-M-y',
                                            strtotime($value2->start_date)) . ' to ' . date('d-M-y',
                                            strtotime($value2->end_date)) : '' ?></td>
                                <td style="color: <?= $color ?>"><?= $value2->unpaid_months ?></td>
                                <td style="color: <?= $color ?>"><?= $this->Number->format($value2->balance) ?></td>
                                <td style="color: <?= $color ?>"><?= $this->Number->format($value2->for_commission) ?></td>
                                <td style="color: <?= $color ?>"><?= $this->Number->format($value2->for_client) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td>SUB TOTALS</td>
                            <td></td>
                            <td></td>
                            <td><span class="sub-totals"><?= $this->Number->format($property_sum_total_paid) ?></span>
                            </td>
                            <td></td>
                            <td></td>
                            <td><span class="sub-totals"><?= $this->Number->format($property_sum_security) ?></span>
                            </td>
                            <td></td>
                            <td></td>
                            <td><span class="sub-totals"><?= $this->Number->format($property_sum_balance) ?></span></td>
                            <td><span class="sub-totals"><?= $this->Number->format($property_sum_commission) ?></span>
                            </td>
                            <td><span class="sub-totals"><?= $this->Number->format($property_sum_client) ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td>..</td>
                        <td>..</td>
                        <td>..</td>
                        <td>..</td>
                        <td>..</td>
                        <td>..</td>
                        <td>..</td>
                        <td>..</td>
                        <td>..</td>
                        <td>..</td>
                        <td>..</td>
                        <td>..</td>
                    </tr>
                    <tr>
                        <td>TOTAL</td>
                        <td></td>
                        <td></td>
                        <td><span class="totals"><?= $this->Number->format($sum_total_paid) ?></span></td>
                        <td></td>
                        <td></td>
                        <td><span class="totals"><?= $this->Number->format($sum_security) ?></span></td>
                        <td></td>
                        <td></td>
                        <td><span class="totals"><?= $this->Number->format($sum_balance) ?></span></td>
                        <td><span class="totals"><?= $this->Number->format($sum_commission) ?></span></td>
                        <td><span class="totals"><?= $this->Number->format($sum_client) ?></span></td>
                    </tr>
                </table>

            <?php endif; ?>
        </div>
        <div class="related" style="display: none">

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
                            <h4><h4><?= __('Expenses') ?></h4></h4>
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
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>

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
        <div class="related" style="display: none">

            <?php if (!empty($cashs)): ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th scope="col" colspan="12"><h4><?= __('Cash payments') ?></h4></th>
                    </tr>
                    <thead>
                    <tr>
                        <th scope="col"><?= 'Date' ?></th>
                        <th scope="col"><?= 'Tenant' ?></th>
                        <th scope="col"><?= 'Method' ?></th>
                        <th scope="col"><?= 'No.' ?></th>
                        <th scope="col"><?= 'Total Cost' ?></th>
                        <th scope="col"><?= 'Total Paid' ?></th>
                        <th scope="col"><?= 'For Client' ?></th>
                        <th scope="col"><?= 'Commission' ?></th>
                        <th scope="col"><?= 'Paid to Client' ?></th>
                        <th scope="col"><?= 'Start Date' ?></th>
                        <th scope="col"><?= h('End date') ?></th>
                        <th scope="col"><?= 'Balance' ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $total_cash = 0;
                    foreach ($cashs as $rent):
                        $total_cash += $rent->total_paid;
                        ?>
                        <tr>
                            <td><?= date('d-M-y', strtotime($rent->date)) ?></td>
                            <td><?= h($rent->occupant->full_name) ?></td>
                            <td><?= h($rent->method) ?></td>
                            <td><?= h($rent->no) ?></td>
                            <td><?= $this->Number->format($rent->total_cost) ?></td>
                            <td><?= $this->Number->format($rent->total_paid) ?></td>
                            <td><?= $this->Number->format($rent->for_client) ?></td>
                            <td><?= $this->Number->format($rent->for_commission) ?></td>
                            <td><?= h($rent->paid_to_client) ?></td>
                            <td><?= date('d-M-y', strtotime($rent->start_date)) ?></td>
                            <td><?= date('d-M-y', strtotime($rent->end_date)) ?></td>
                            <td><?= $this->Number->format($rent->balance) ?></td>

                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td>..</td>
                        <td></td>
                        <td></td>
                        <td></td>
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
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>TOTAL</td>
                        <td><span class="totals"><?= $this->Number->format($total_cash) ?></span></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>


                    </tbody>
                </table>
            <?php endif; ?>
        </div>
        <div class="related" style="display: none">

            <?php if (!empty($installments)): ?>

                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th scope="col" colspan="6"><h4><?= __('Installments/Partial Payments') ?></h4></th>

                    </tr>
                    <tr>
                        <th scope="col"><?= __('Date') ?></th>
                        <th scope="col"><?= __('Tenant') ?></th>
                        <th scope="col"><?= __('Amount') ?></th>
                        <th scope="col"><?= __('No') ?></th>
                        <th scope="col"><?= __('Deadline') ?></th>
                        <th scope="col"><?= __('Balance') ?></th>
                    </tr>

                    <?php
                    /*  echo '<pre>';
                      var_dump($installments);
                      echo '</pre>';*/
                    $installments_sum = 0;
                    foreach ($installments as $reqs):
                        $installments_sum += $reqs['amount']
                        ?>
                        <tr>

                            <td><?= date('d-M-y', strtotime($reqs->date)) ?></td>
                            <td><?= $reqs->user->full_name ?></td>
                            <td><?= $this->Number->format($reqs->amount) ?></td>
                            <td><?= h($reqs->no) ?></td>
                            <td><?= h($reqs->deadline) ?></td>
                            <td><?= $this->Number->format($reqs['balance']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                    </tr>

                    <tr>

                        <td></td>
                        <td>TOTAL:</td>
                        <td><span class="totals"><?= $this->Number->format($installments_sum) ?></span></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                </table>
            <?php endif; ?>

        </div>
        <div class="related" style="display: none">

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
        <div class="related">
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col" colspan="2"><h4>SUMMARY</h4></th>
                </tr>
                <tr>
                    <td>TOTAL: PAYMENTS</td>
                    <td><span class="sub-totals"><?= $this->Number->format($sum_total_paid) ?></span></td>
                </tr>
                <tr>
                    <td>CASH</td>
                    <td><span class="sub-totals"><?= $this->Number->format($total_cash) ?></span></td>
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
