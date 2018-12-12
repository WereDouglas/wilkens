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
                            <select class="form-control show-tick" id="user_id" name="user_id">
                                <?php foreach ($users as $user): ?>
                                    <option value="<?= $user->id; ?>"><?= $user->full_name; ?></option>

                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
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


<div class="rents index large-12 medium-12 columns content">
    <?= $this->Element('nav', ['links' => $links_array, 'title' => 'Rent Report']); ?>
    <div class="related">

        <h4><?= __('Financial Information ') . $start_date . ' ' . $end_date ?></h4>
        <?php if (!empty($financials)): ?>

            <?php
            $result = array();
            foreach ($financials as $element) {
                $result[$element['property_name']][] = $element;
            }
            ?>
            <table cellpadding="0" cellspacing="0">
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
                        <td colspan="12"><?= $key ?></td>
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

                            $color = '#1ABC9C';//green
                        } else {
                            if (strtotime($value2->tenancy_end) < strtotime($start_date)) {
                                $color = '#FF0000';//red
                            } else {
                                $color = '#2B2B2B';//gray
                            }
                        }
                        ?>

                        <tr>
                            <td><?= $value2['room'] ?></td>
                            <td><font color="<?= $color ?>"><?= $value2['first_name'] . ' ' . $value2['last_name'] ?></font>
                            </td>
                            <td><?= $this->Number->format($value2['cost']) ?></td>
                            <td><?= $this->Number->format($value2['total_paid']) ?></td>
                            <td><?= (!empty($value2->date)) ? date('d-M-y', strtotime($value2->date)) : ''; ?></td>
                            <td><?= $value2->paid_months ?></td>
                            <td><?= $this->Number->format($value2->security) ?></td>
                            <td><?= (!empty($value2->start_date)) ? date('d-M-y',
                                        strtotime($value2->start_date)) . ' to ' . date('d-M-y',
                                        strtotime($value2->end_date)) : '' ?></td>
                            <td><?= $value2->unpaid_months ?></td>
                            <td><?= $this->Number->format($value2->balance) ?></td>
                            <td><?= $this->Number->format($value2->for_commission) ?></td>
                            <td><?= $this->Number->format($value2->for_client) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td>TOTALS</td>
                        <td></td>
                        <td></td>
                        <td><?= $this->Number->format($property_sum_total_paid) ?></td>
                        <td></td>
                        <td></td>
                        <td><?= $this->Number->format($property_sum_security) ?></td>
                        <td></td>
                        <td></td>
                        <td><?= $this->Number->format($property_sum_balance) ?></td>
                        <td><?= $this->Number->format($property_sum_commission) ?></td>
                        <td><?= $this->Number->format($property_sum_client) ?></td>
                    </tr>


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
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>TOTALS</td>
                    <td></td>
                    <td></td>
                    <td><?= $this->Number->format($sum_total_paid) ?></td>
                    <td></td>
                    <td></td>
                    <td><?= $this->Number->format($sum_security) ?></td>
                    <td></td>
                    <td></td>
                    <td><?= $this->Number->format($sum_balance) ?></td>
                    <td><?= $this->Number->format($sum_commission) ?></td>
                    <td><?= $this->Number->format($sum_client) ?></td>

                </tr>


            </table>

        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Expenses') ?></h4>
        <?php if (!empty($requisitions)): ?>
            <?php
            $result = array();
            foreach ($requisitions as $element) {
                $result[$element['no']][] = $element;
            }
            ?>
            <table cellpadding="0" cellspacing="0">

                <tr>
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
                        <td colspan="7"> NO :<?= $key ?></td>
                    </tr>
                    <?php

                    foreach ($value as $key2 => $reqs):
                        $expenses_sum += $reqs['total']
                        ?>
                        <tr>
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
                    <td>TOTAL:</td>
                    <td><?= $this->Number->format($expenses_sum) ?></td>

                </tr>
            </table>
        <?php endif; ?>

    </div>

    <div class="related">
        <h4><?= __('Cash payments') ?></h4>
        <?php if (!empty($financials)): ?>
            <table cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th scope="col"><?= 'Date' ?></th>
                    <th scope="col"><?= 'Tenant' ?></th>
                    <th scope="col"><?= 'method' ?></th>
                    <th scope="col"><?= 'no' ?></th>
                    <th scope="col"><?= 'total cost' ?></th>
                    <th scope="col"><?= 'total paid' ?></th>
                    <th scope="col"><?= 'for client' ?></th>
                    <th scope="col"><?= ' commission' ?></th>
                    <th scope="col"><?= 'paid to client' ?></th>
                    <th scope="col"><?= 'start date' ?></th>
                    <th scope="col"><?= h('end date') ?></th>
                    <th scope="col"><?= 'balance' ?></th>


                </tr>
                </thead>
                <tbody>
                <?php foreach ($cashs as $rent): ?>
                    <tr>
                        <td><?= h($rent->date) ?></td>
                        <td><?= h($rent->occupant->full_name) ?></td>
                        <td><?= h($rent->method) ?></td>
                        <td><?= h($rent->no) ?></td>
                        <td><?= $this->Number->format($rent->total_cost) ?></td>
                        <td><?= $this->Number->format($rent->total_paid) ?></td>
                        <td><?= $this->Number->format($rent->for_client) ?></td>

                        <td><?= $this->Number->format($rent->for_commission) ?></td>
                        <td><?= h($rent->paid_to_client) ?></td>
                        <td><?= h($rent->start_date) ?></td>
                        <td><?= h($rent->end_date) ?></td>
                        <td><?= $this->Number->format($rent->balance) ?></td>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>


    <div class="related">
        <h4><?= __('Installments/Partial Payments') ?></h4>
        <?php if (!empty($installments)): ?>

            <table cellpadding="0" cellspacing="0">

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

                    <td></td>
                    <td>TOTAL:</td>
                    <td><?= $this->Number->format($installments_sum) ?></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
            </table>
        <?php endif; ?>

    </div>


</div>
<div class="related">
    <h4><?= __('Tenancy status') ?></h4>
    <?php if (!empty($tenancy)): ?>

        <?php
        $result = array();
        foreach ($tenancy as $element) {
            $result[$element['property_name']][] = $element;
        }
        ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('H/N') ?></th>
                <th scope="col"><?= __('Tenant name') ?></th>
                <th scope="col"><?= __('Ag.Amount /Month') ?></th>
                <th scope="col"><?= __('From') ?></th>
                <th scope="col"><?= __('To') ?></th>
            </tr>
            <?php foreach ($result as $key => $value): ?>
                <tr>
                    <td colspan="5"><?= $key ?></td>
                </tr>
                <?php foreach ($value as $key2 => $value2): ?>
                    <tr>
                        <td><?= $value2['room'] ?></td>
                        <td><?= $value2['first_name'] . ' ' . $value2['last_name'] ?></td>
                        <td><?= $this->Number->format($value2['cost']) ?></td>

                        <td><?= date('d-M-y', strtotime($value2->tenancy_start)) ?></td>
                        <td><?= date('d-M-y', strtotime($value2->tenancy_end)) ?></td>

                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>

        </table>

    <?php endif; ?>
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

