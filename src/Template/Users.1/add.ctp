<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                <div class="header">
                            <h2>
                               ADD USER
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                    <?= $this->Html->link(__('List Users'), ['action' => 'index']) ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>

 <div class="body">

<?=$this->Form->create($user, ['type' => 'file'])?>
    <fieldset>
     <?php $start_input = '<div class="form-group"><div class="form-line">';?>
     <?php  $end_input = '</div ></div>';?>
       
     <div class="row clearfix">
            <div class="col-sm-12">
        <?php         
            echo $start_input.$this->Form->control('first_name', ['class' => 'form-control', 'placeholder' => 'First name']).$end_input;
         
            echo $start_input.$this->Form->control('last_name', ['class' => 'form-control', 'placeholder' => 'Last name']).$end_input;
            echo $start_input.$this->Form->control('contact', ['class' => 'form-control', 'placeholder' => 'Contact']).$end_input;
            echo $start_input.$this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'Email']).$end_input;
            echo $start_input.$this->Form->control('photo', ['type' => 'file','class' => 'form-control']).$end_input;             
            echo $start_input.$this->Form->control('address', ['class' => 'form-control', 'placeholder' => 'Address']).$end_input;
            echo $start_input.$this->Form->control('password', ['class' => 'form-control', 'placeholder' => 'Password']).$end_input;
            echo $start_input.$this->Form->control('active', ['class' => 'form-control', 'placeholder' => 'Active']).$end_input;
            echo $start_input.$this->Form->control('created_at', ['class' => 'form-control', 'placeholder' => 'First name']).$end_input;
            echo $start_input.$this->Form->control('company_id', ['class' => 'form-control','options' => $companies, 'empty' => true]).$end_input;
            echo $start_input.$this->Form->control('branch_id', ['class' => 'form-control','options' => $branches, 'empty' => true]).$end_input;
            echo $start_input.$this->Form->control('department_id', ['class' => 'form-control','options' => $departments, 'empty' => true]).$end_input;
            echo $start_input.$this->Form->control('permissions._ids', ['class' => 'form-control','options' => $permissions]).$end_input;
            echo $start_input.$this->Form->control('roles._ids', ['class' => 'form-control','options' => $roles]).$end_input;
            
        ?>
         </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>
</div>
</div>
