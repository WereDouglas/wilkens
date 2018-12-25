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


    .groups {
        font-weight: bold;
        padding: 5px;
        font-size: larger;
        color: #2B2B2B;
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


<div class="rents index large-12 medium-12 columns content table-responsive">
    <?= $this->Element('nav', ['links' => $links_array, 'title' => 'Expenses']); ?>

    <div class="print" id="printableArea" style="display:block;">

        <div class="related">

            <?php if (!empty($requisitions)): ?>
                <?php
                $result = array();
                foreach ($requisitions as $element) {
                    $result[$element['no'] . ' ' . $element['details']][] = $element;
                }
                ?>
                <table cellpadding="0" cellspacing="0"
                       class="table table-bordered table-striped table-hover dataTable js-exportable ">
                    <tr>
                        <th scope="col" colspan="8">
                            <h4><h4><?= $client->full_name . ' ' . __(' Expenses from ') . date('d-M-y',
                                        strtotime($start_date)) . ' to ' . date('d-M-y', strtotime($end_date)) ?></h4>
                            </h4>
                            </h4>
                        </th>
                    </tr>
                    <tr>
                        <th scope="col"><?= __('No') ?></th>
                        <th scope="col"><?= __('Date') ?></th>
                        <th scope="col"><?= __('Category') ?></th>
                        <th scope="col"><?= __('Item/Description') ?></th>
                        <th scope="col"><?= __('Qty') ?></th>
                        <th scope="col"><?= __('Cost') ?></th>
                        <th scope="col"><?= __('Total') ?></th>
                        <th scope="col"></th>

                    </tr>
                    <?php

                    $expenses_total = 0;
                    foreach ($result as $key => $value): ?>
                        <tr>
                            <td><span class="groups"> NO :<?= $key . ' ' ?>  </span></td>
                            <td colspan="7"></td>
                        </tr>
                        <?php
                        $expenses_sum = 0;
                        foreach ($value as $key2 => $reqs):

                            $expenses_total += $reqs['total'];
                            $expenses_sum += $reqs['total']
                            ?>
                            <tr>
                                <td></td>
                                <td><?= date('d-M-y', strtotime($reqs->date)) ?></td>
                                <td><?= h($reqs->category) ?></td>
                                <td><?= h($reqs->item) ?></td>
                                <td><?= h($reqs->qty) ?></td>
                                <td><?= $this->Number->format($reqs['cost']) ?></td>
                                <td><?= $this->Number->format($reqs->total) ?></td>
                                <td>
                                    SUB TOTAL <span
                                        class="sub-totals"><?= $this->Number->format($expenses_sum) ?></span>
                                </td>

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
                        <td><span class="totals"><?= $this->Number->format($expenses_total) ?></span></td>

                    </tr>
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

