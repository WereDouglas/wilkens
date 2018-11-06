<?php 

var_dump($links_array);
 
foreach ($links_array as list($title, $options)) {
    '<li>'.$this->Html->link(__($title), $options).'</li>';
}

?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2> ADD </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">                    
                        <?php 
                        
                        foreach ($links_array as list($title, $options)) {
                            '<li>'.$this->Html->link(__($title), $options).'</li>';
                        }
                        ?> 
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-12">                    
                         <?php                         
                        
                         $this->Form->create($permissions)                         
                         ?>
                         <?php          
                           
                            echo $this->element('inputFields', ['array'=>$input_array]);
                           ?> 
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary m-t-15 waves-effect']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
