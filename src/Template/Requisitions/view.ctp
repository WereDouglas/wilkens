<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requisition $requisition
 */
$links_array = [

    ['List Requisitions', ['controller' => 'Requisitions', 'action' => 'index']],
    ['New Requisition', ['controller' => 'Requisitions', 'action' => 'add']],
];
?>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?=$this->Html->css('base.css')?>
<?=$this->Html->css('invoice.css')?>
<div class="requisitions view large-9 medium-8 columns content">


    <?= $this->Element('nav',['links'=>$links_array,'title'=>$requisition->no]);   ?>


    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                       REQUISITION
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div id="invoice">

                        <div class="toolbar hidden-print">
                            <div class="text-right">
                                <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
                                <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
                            </div>
                            <hr>
                        </div>
                        <div class="invoice overflow-auto">
                            <div style="min-width: 600px">
                                <header>
                                    <div class="row">
                                        <div class="col">
                                            <a target="_blank" href="#">
                                                <img src="<?= $this->Url->build($this->session->read('company_image')); ?>" data-holder-rendered="true" />
                                            </a>
                                        </div>
                                        <div class="col company-details">
                                            <h2 class="name">
                                                <a target="_blank" href="https://lobianijs.com">
                                                    <?= $requisition->has('property') ? $this->Html->link($requisition->property->name, ['controller' => 'Properties', 'action' => 'view', $requisition->property->id]) : '' ?></td>

                                                </a>
                                            </h2>
                                            <div><?= __('Unit') ?>: <?= $requisition->has('unit') ? $this->Html->link($requisition->unit->name, ['controller' => 'Units', 'action' => 'view', $requisition->unit->id]) : '' ?></div>

                                        </div>
                                    </div>
                                </header>
                                <main>
                                    <div class="row contacts">
                                        <div class="col invoice-to">
                                            <div class="text-gray-light">REQ TO:</div>
                                            <h2 class="to"><?= $requisition->has('user') ? $this->Html->link($requisition->user->full_name, ['controller' => 'Users', 'action' => 'view', $requisition->user->id]) : '' ?></h2>
                                            <div class="address"><?= __('User') ?>
                                                <?= $requisition->has('user') ? $this->Html->link($requisition->user->full_name, ['controller' => 'Users', 'action' => 'view', $requisition->user->id]) : '' ?></div>
                                            <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>
                                            <div class="row">
                                                <h4><?= __('Details') ?></h4>
                                                <?= $this->Text->autoParagraph(h($requisition->details)); ?>
                                            </div>
                                            <div class="row">
                                                <h4><?= __('Remarks') ?></h4>
                                                <?= $this->Text->autoParagraph(h($requisition->remarks)); ?>
                                            </div>
                                            <div class="row">
                                                <?= __('Method') ?> : <?= h($requisition->method) ?>
                                            </div>

                                        </div>
                                        <div class="col invoice-details">
                                            <h1 class="invoice-id">REQ <?= $this->Number->format($requisition->no) ?></h1>
                                            <div class="date"><?= __('Created At') ?> : <?= h($requisition->created_at) ?></div>
                                            <div class="date">Due Date: <?= date('d-M-yy', strtotime($requisition->date)) ?></div>
                                        </div>
                                    </div>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="text-left">DESCRIPTION</th>
                                            <th class="text-right">COST</th>
                                            <th class="text-right">QUANTITY</th>
                                            <th class="text-right">TOTAL</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $sum = 0;
                                        foreach ($requisition->expenses as $expenses): ?>
                                         <?php  $sum += $expenses->total?>
                                            <tr>
                                                <td class="no"><?= h($expenses->no) ?></td>
                                                <td class="text-left"><?= h($expenses->item) ?></td>
                                                <td class="unit"><?= number_format($expenses->cost) ?></td>
                                                <td class="qty"><?= h($expenses->qty) ?></td>
                                                <td class="total"><?= number_format($expenses->total) ?></td>


                                            </tr>
                                        <?php endforeach; ?>

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">SUBTOTAL</td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">GRAND TOTAL</td>
                                            <td><?php echo number_format($sum)?></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <div class="thanks">HN</div>
                                    <div class="notices">
                                        <div>REMARKS:</div>
                                        <div>
                                       <?= __('Type') ?>
                                                   <?= h($requisition->type) ?><?= __('Approved') ?> : <?= h($requisition->approved) ?><br>
                                                 <?= __('Approved by') ?> :<?= h($requisition->approver->full_name) ?><br>

                                                        <?= __('Paid') ?> :<?= h($requisition->paid) ?><br>

                                                        <?= __('Paid by') ?>: <?= h($requisition->paider->full_name) ?><br>


                                            <?= __('Repaired') ?>: <?= h($requisition->repaired) ?><br><?= __('Requested by') ?></th>
                                                   <?= h($requisition->requested->full_name) ?><?= __('Category') ?><br>
                                                   <?= h($requisition->category) ?><br>
                                                <?= __('Property') ?><br>

                                               <?= __('No') ?> : <?= $this->Number->format($requisition->no) ?><br>
                                                <?= __('Date') ?> : <?= h($requisition->date) ?><br>


                                        </div>
                                    </div>
                                </main>
                                <footer>
                                    Invoice was created on a computer and is valid without the signature and seal.
                                </footer>
                            </div>
                            <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="related">
        <h4><?= __('Manage Expenses') ?></h4>
        <?php if (!empty($requisition->expenses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Item') ?></th>
                <th scope="col"><?= __('Qty') ?></th>
                <th scope="col"><?= __('Cost') ?></th>
                <th scope="col"><?= __('Total') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Editable') ?></th>
                <th scope="col"><?= __('No') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($requisition->expenses as $expenses): ?>
            <tr>

                <td><?= h($expenses->item) ?></td>
                <td><?= h($expenses->qty) ?></td>
                <td><?= number_format($expenses->cost) ?></td>
                <td><?= number_format($expenses->total) ?></td>
                <td><?= h($expenses->created_at) ?></td>

                <td><?= h($expenses->editable) ?></td>
                <td><?= h($expenses->no) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Expenses', 'action' => 'view', $expenses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Expenses', 'action' => 'edit', $expenses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Expenses', 'action' => 'delete', $expenses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expenses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

<script >
    $('#printInvoice').click(function(){
        Popup($('.invoice')[0].outerHTML);
        function Popup(data)
        {
            window.print();
            return true;
        }
    });

</script>
