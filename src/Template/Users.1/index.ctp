<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
use Cake\Routing\Router;
?>
<?=$this->element('tableCss')?>
<!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                            <h3><?=__('Users')?></h3>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                    <li class="heading"><?=__('Actions')?></li>
                                    <li><?=$this->Html->link(__('New User'), ['action' => 'add'])?></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                               
                                <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-hover dataTable js-exportable">
        <thead>
            <tr>
                <th style="display:none" scope="col"><?=$this->Paginator->sort('id')?></th>
                <th scope="col"><?=$this->Paginator->sort('first_name')?></th>
                <th scope="col"><?=$this->Paginator->sort('last_name')?></th>
                <th scope="col"><?=$this->Paginator->sort('contact')?></th>
                <th scope="col"><?=$this->Paginator->sort('email')?></th>
                <th scope="col"><?=$this->Paginator->sort('photo')?></th>
                <th scope="col"><?=$this->Paginator->sort('address')?></th>
              
                <th scope="col"><?=$this->Paginator->sort('active')?></th>
                <th scope="col"><?=$this->Paginator->sort('created_at')?></th>
                <th scope="col"><?=$this->Paginator->sort('company_id')?></th>
                <th scope="col"><?=$this->Paginator->sort('branch_id')?></th>
                <th scope="col"><?=$this->Paginator->sort('department_id')?></th>
                <th scope="col" class="actions"><?=__('Actions')?></th>
            </tr>
        </thead>
        <tfoot>
          <tr>
             <th style="display:none" scope="col"><?=$this->Paginator->sort('id')?></th>
                <th scope="col"><?=$this->Paginator->sort('first_name')?></th>
                <th scope="col"><?=$this->Paginator->sort('last_name')?></th>
                <th scope="col"><?=$this->Paginator->sort('contact')?></th>
                <th scope="col"><?=$this->Paginator->sort('email')?></th>
                <th scope="col"><?=$this->Paginator->sort('photo')?></th>
                <th scope="col"><?=$this->Paginator->sort('address')?></th>
             
                <th scope="col"><?=$this->Paginator->sort('active')?></th>
                <th scope="col"><?=$this->Paginator->sort('created_at')?></th>
                <th scope="col"><?=$this->Paginator->sort('company_id')?></th>
                <th scope="col"><?=$this->Paginator->sort('branch_id')?></th>
                <th scope="col"><?=$this->Paginator->sort('department_id')?></th>
                <th scope="col" class="actions"><?=__('Actions')?></th>
                                        </tr>
                                    </tfoot>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td style="display:none" ><?=h($user->id)?></td>
                <td><?=h($user->first_name)?></td>
                <td><?=h($user->last_name)?></td>
                <td><?=h($user->contact)?></td>
                <td><?=h($user->email)?></td>
                <td>
                    <?php 
                    if (h($user->photo)===null)
                    {                    
                    ?>
                        <img src="..\webroot\img\user.png" width="48" height="48" alt="User" /> 
                     <?php 
                    }
                    else{
                    ?> 
                      <input type="image" src="<?=h($user->photo_dir) . '' . h($user->photo);?>" height="40" width = "40" /></td>
             
                    <?php 
                    }
                    ?>                 
                
                <td><?=h($user->address)?></td>               
                <td><?=h($user->active)?></td>
                <td><?=h($user->created_at)?></td>
                <td><?=$user->has('company') ? $this->Html->link($user->company->name, ['controller' => 'Companies', 'action' => 'view', $user->company->id]) : ''?></td>
                <td><?=$user->has('branch') ? $this->Html->link($user->branch->name, ['controller' => 'Branches', 'action' => 'view', $user->branch->id]) : ''?></td>
                <td><?=$user->has('department') ? $this->Html->link($user->department->name, ['controller' => 'Departments', 'action' => 'view', $user->department->id]) : ''?></td>
                <td class="actions">
                <button onclick="window.location.href='<?php echo Router::url(array('action' => 'view', $user->id ))?>'"  type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                    <i class="material-icons">more_horiz</i>
                    </button>
                     <button onclick="window.location.href='<?php echo Router::url(array('action' => 'edit', $user->id ))?>'"  type="button" class="btn bg-blue-grey btn-circle waves-effect waves-circle waves-float">
                                    <i class="material-icons">mode_edit</i>
                    </button>                                    
                   
                    <?=$this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)])?>
               <?=$this->Form->postLink( $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')). " Delete", array('action' => 'delete', $user->id),array('escape'=>false),__('Are you sure you want to delete # %s?', $user->id),array('class' => 'btn bg-red btn-circle waves-effect waves-circle waves-float'));?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?=$this->Paginator->first('<< ' . __('first'))?>
            <?=$this->Paginator->prev('< ' . __('previous'))?>
            <?=$this->Paginator->numbers()?>
            <?=$this->Paginator->next(__('next') . ' >')?>
            <?=$this->Paginator->last(__('last') . ' >>')?>
        </ul>
        <p><?=$this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')])?></p>
    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->

<?=$this->element('tableScripts')?>
