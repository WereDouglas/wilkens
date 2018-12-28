<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Deposit[]|\Cake\Collection\CollectionInterface $deposits
 */
?>
<?= $this->Html->css('bootstrap-select.css') ?>
<?= $this->element('tableCss') ?>
<div class="deposits index large-12 medium-8 columns content">
    <div class="card">
        <div class="header">
            Generate
            <?php echo $this->Form->create('deposits', array(
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
    <?php if (!empty($deposits)): ?>
        <table cellpadding="0" cellspacing="0"
               class="table table-bordered table-striped table-hover dataTable js-exportable">
            <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('total_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rent_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expense_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('method') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prepared_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deposited_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('complete') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('account_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('account_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('account_name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($deposits as $deposit): ?>
                <tr>

                    <td><?= $this->Number->format($deposit->total_amount) ?></td>
                    <td><?= $this->Number->format($deposit->rent_amount) ?></td>
                    <td><?= $this->Number->format($deposit->expense_amount) ?></td>
                    <td><?= h($deposit->method) ?></td>
                    <td><?= h($deposit->date) ?></td>
                    <td><?= h($deposit->prepared->full_name) ?></td>
                    <td><?= h($deposit->approved->full_name) ?></td>
                    <td><?= h($deposit->deposited->full_name) ?></td>
                    <td><?= h($deposit->complete) ?></td>
                    <td><?= h($deposit->created_at) ?></td>
                    <td><?= $deposit->has('account') ? $this->Html->link($deposit->account->no,
                            ['controller' => 'Accounts', 'action' => 'view', $deposit->account->id]) : '' ?></td>
                    <td><?= $deposit->has('user') ? $this->Html->link($deposit->user->full_name,
                            ['controller' => 'Users', 'action' => 'view', $deposit->user->id]) : '' ?></td>
                    <td><?= h($deposit->account_no) ?></td>
                    <td><?= h($deposit->account_name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $deposit->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deposit->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deposit->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $deposit->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
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
