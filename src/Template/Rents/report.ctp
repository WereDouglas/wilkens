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
                        <div class="row clearfix">
                            <div class="col-sm-3">
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
                                        'label' => 'Please choose a start date...'
                                    )); ?>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <?php echo $this->Form->submit('GENERATE', array(
                                    'div' => 'form-group',
                                    'class' => 'btn btn-success btn-lg m-l-15 waves-effect'
                                )); ?>


                            </div>
                        </div>
                <?php echo $this->Form->end(); ?>

            </div>
            <div class="body">

            </div>
        </div>
    </div>


<div class="rents index large-12 medium-12 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=>'List of  Rent Payments']);   ?>


    <table cellpadding="0" cellspacing="0" id="table"  class="table table-bordered table-striped table-hover dataTable js-exportable">
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
<?=$this->Html->script(['jquery.min', 'bootstrap', 'bootstrap-select', 'jquery.slimscroll', 'waves', 'admin', 'demo', 'autosize.js', 'moment.js','bootstrap-material-datetimepicker.js','basic-form-elements.js']);?>
<script>
    /*!
 RowGroup 1.0.4
 ©2017-2018 SpryMedia Ltd - datatables.net/license
*/
    (function(c){"function"===typeof define&&define.amd?define(["jquery","datatables.net"],function(d){return c(d,window,document)}):"object"===typeof exports?module.exports=function(d,f){d||(d=window);if(!f||!f.fn.dataTable)f=require("datatables.net")(d,f).$;return c(f,d,d.document)}:c(jQuery,window,document)})(function(c,d,f,h){var e=c.fn.dataTable,g=function(a,b){if(!e.versionCheck||!e.versionCheck("1.10.8"))throw"RowGroup requires DataTables 1.10.8 or newer";this.c=c.extend(!0,{},e.defaults.rowGroup,
        g.defaults,b);this.s={dt:new e.Api(a),dataFn:e.ext.oApi._fnGetObjectDataFn(this.c.dataSrc)};this.dom={};var j=this.s.dt.settings()[0],k=j.rowGroup;if(k)return k;j.rowGroup=this;this._constructor()};c.extend(g.prototype,{dataSrc:function(a){if(a===h)return this.c.dataSrc;var b=this.s.dt;this.c.dataSrc=a;this.s.dataFn=e.ext.oApi._fnGetObjectDataFn(this.c.dataSrc);c(b.table().node()).triggerHandler("rowgroup-datasrc.dt",[b,a]);return this},disable:function(){this.c.enable=!1;return this},enable:function(a){if(!1===
            a)return this.disable();this.c.enable=!0;return this},_constructor:function(){var a=this,b=this.s.dt,c=[];b.rows().every(function(){var b=this.data(),b=a.s.dataFn(b);-1==c.indexOf(b)&&c.push(b)});b.on("draw.dtrg",function(){a.c.enable&&a._draw()});b.on("column-visibility.dt.dtrg responsive-resize.dt.dtrg",function(){a._adjustColspan()});b.on("destroy",function(){b.off(".dtrg")})},_adjustColspan:function(){c("tr."+this.c.className,this.s.dt.table().body()).attr("colspan",this._colspan())},_colspan:function(){return this.s.dt.columns().visible().reduce(function(a,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  b){return a+b},0)},_draw:function(){var a=this,b=this.s.dt,c=[],e,d;b.rows({page:"current"}).every(function(){var b=this.data(),b=a.s.dataFn(b);if(null===b||b===h)b=a.c.emptyDataGroup;if(e===h||b!==e)c.push([]),e=b;c[c.length-1].push(this.index())});for(var g=0,f=c.length;g<f;g++){var i=c[g],l=b.row(i[0]),m=this.s.dataFn(l.data());this.c.startRender&&(d=this.c.startRender.call(this,b.rows(i),m),(d=this._rowWrap(d,this.c.startClassName))&&d.insertBefore(l.node()));this.c.endRender&&(d=this.c.endRender.call(this,
            b.rows(i),m),(d=this._rowWrap(d,this.c.endClassName))&&d.insertAfter(b.row(i[i.length-1]).node()))}},_rowWrap:function(a,b){if(null===a||a===h||""===a)a=this.c.emptyDataGroup;return null===a?null:("object"===typeof a&&a.nodeName&&"tr"===a.nodeName.toLowerCase()?c(a):a instanceof c&&a.length&&"tr"===a[0].nodeName.toLowerCase()?a:c("<tr/>").append(c("<td/>").attr("colspan",this._colspan()).append(a))).addClass(this.c.className).addClass(b)}});g.defaults={className:"group",dataSrc:0,emptyDataGroup:"No group",
        enable:!0,endClassName:"group-end",endRender:null,startClassName:"group-start",startRender:function(a,b){return b}};g.version="1.0.4";c.fn.dataTable.RowGroup=g;c.fn.DataTable.RowGroup=g;e.Api.register("rowGroup()",function(){return this});e.Api.register("rowGroup().disable()",function(){return this.iterator("table",function(a){a.rowGroup&&a.rowGroup.enable(!1)})});e.Api.register("rowGroup().enable()",function(a){return this.iterator("table",function(b){b.rowGroup&&b.rowGroup.enable(a===h?!0:a)})});
        e.Api.register("rowGroup().dataSrc()",function(a){return a===h?this.context[0].rowGroup.dataSrc():this.iterator("table",function(b){b.rowGroup&&b.rowGroup.dataSrc(a)})});c(f).on("preInit.dt.dtrg",function(a,b){if("dt"===a.namespace){var d=b.oInit.rowGroup,f=e.defaults.rowGroup;if(d||f)f=c.extend({},f,d),!1!==d&&new g(b,f)}});return g});


    $(document).ready(function() {
        $('#table').DataTable( {
            order: [[2, 'asc']],
            rowGroup: {
                endRender: function ( rows, group ) {
                    var avg = rows
                        .data()
                        .pluck(5)
                        .reduce( function (a, b) {
                            return a + b.replace(/[^\d]/g, '')*1;
                        }, 0) / rows.count();

                    return 'Average salary in '+group+': '+
                        $.fn.dataTable.render.number(',', '.', 0, '$').display( avg );
                },
                dataSrc: 2
            }
        } );
    } );
</script>
