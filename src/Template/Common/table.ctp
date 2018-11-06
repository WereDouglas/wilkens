<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */

use Cake\Routing\Router;

$links = json_decode($this->fetch('links'), true);
$fields = json_decode($this->fetch('fields'), true);
$page_header = $this->fetch('page_header');
?>
<?= $this->element('tableCss') ?>
<!-- #END# Basic Examples -->
<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    <h3><?= $page_header ?></h3>
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle " data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <?php

                            foreach ($links as [$title, $options]) {
                                echo '<li>' . $this->Html->link(__($title), $options) . '</li>';
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">

                    <table cellpadding="0" cellspacing="0"
                           class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                        <tr>
                            <?php
                            foreach ($headers as $header) {
                                echo '<th scope="col">' . $this->Paginator->sort($header) . '</th>';
                            }
                            ?>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>


                            <?php
                            foreach ($objects as $object) {
                                echo '<tr>';
                                foreach ($object as $field) {
                                    echo '<td>' . h($field) . '</td>';
                                }

                                $id = $object->first();
                                ?>
                                <td class="actions">
                                    <button
                                        onclick="window.location.href='<?php echo Router::url(array('action' => 'view', $id)); ?>'"
                                        type="button"
                                        class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                        <i class="material-icons">more_horiz</i>
                                    </button>
                                    <button
                                        onclick="window.location.href='<?php echo Router::url(array('action' => 'edit', $id)); ?>'"
                                        type="button"
                                        class="btn bg-blue-grey btn-circle waves-effect waves-circle waves-float">
                                        <i class="material-icons">mode_edit</i>
                                    </button>

                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $id], ['confirm' => __('Are you sure you want to delete # {0}?', $id)]) ?></td>
                                <?php
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Exportable Table -->

<?= $this->element('tableScripts') ?>

