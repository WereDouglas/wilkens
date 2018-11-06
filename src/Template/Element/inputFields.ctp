<div class="body">
    <div class="row clearfix">
        <div class="col-sm-12">

            <div class="form-group">
                <div class="form-line">
                    <?php
                    //chens way foreach ($array  as [$name,$class,$placeholder]))

                    foreach ($array as list($name, $options)) {

                        echo $this->Form->control($name, $options);
                    }

                    echo '<br>' . $this->Form->button(__('Submit'), ['class' => 'btn btn-primary m-t-15 waves-effect']);

                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
