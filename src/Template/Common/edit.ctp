<?=$this->Html->css('base.css')?>
<?php

/**
 * @var \App\View\AppView $this
 */

$links = json_decode($this->fetch('links'), true);
$inputs = json_decode($this->fetch('inputs'), true);
$id = $this->fetch('id');;
?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2> EDIT </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <?php

                            foreach ($links as [$title, $options]) { // This will search in the 2 jsons
                                echo '<li>' . $this->Html->link(__($title), $options) . '</li>';
                            }
                            ?>
                            <li><?= $this->Form->postLink( __('Delete'), ['action' => 'delete', $id],['confirm' => __('Are you sure you want to delete # {0}?', $id)])?></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <?php
                        echo $this->fetch('form_object');
                        ?>
                        <div class="form-group">
                            <div class="form-line">
                                <?php
                                //chens way foreach ($array  as [$name,$class,$placeholder]))
                                foreach ($inputs as list($name, $options)) {
                                    echo $this->Form->control($name, $options);
                                }
                                echo '<br>' . $this->Form->button(__('Submit'), ['class' => 'btn btn-primary m-t-15 waves-effect']);

                                ?>

                            </div>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
