

<div class="header medium-3">
    <ul class="header-dropdown m-r--5">
        <h3>
            <li class="dropdown">
                <?= $title ?>
                <a href="javascript:void(0);" class="dropdown-toggle " data-toggle="dropdown" role="button"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">more_vert</i>
                </a>
                <ul class="dropdown-menu pull-right">
                    <?php

                    foreach ($links as list($name, $options)) {

                        echo '<li>' . $this->Html->link(__($name), $options) . '</li>';
                    }
                    ?>
                </ul>
        </h3>
    </ul>
</div>
