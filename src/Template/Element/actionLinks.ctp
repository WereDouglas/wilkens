<ul class="header-dropdown m-r--5">
    <li class="dropdown">
        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
           aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">more_vert</i>
        </a>
        <ul class="dropdown-menu pull-right">
            <?php
            foreach ($array as list($name, $options)) {

                echo '<li>' . $this->Html->link(__($name), $options) . '</li>';

            }
            ?>
        </ul>
    </li>
</ul>
