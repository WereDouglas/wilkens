<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */

$links_array = [
    ['List Users', ['action' => 'index']],
    ['New User', ['controller' => 'Users', 'action' => 'add']],
    ['List Companies', ['controller' => 'Companies', 'action' => 'index']],
    ['New Contact', ['controller' => 'Contacts', 'action' => 'add']],

];
?>
<?= $this->element('tableCss') ?>
<div class="users index large-12 medium-12 columns content">
    <div class="panel-group" id="accordion_17" role="tablist" aria-multiselectable="true">

        <div class="panel panel-col-cyan">
            <div class="panel-heading" role="tab" id="headingTwo_17">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseTwo_17" aria-expanded="false"
                       aria-controls="collapseTwo_17">
                        <i class="material-icons">person</i> Search by client
                    </a>
                </h4>
            </div>
            <div id="collapseTwo_17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_17">
                <div class="panel-body">
                    <div class="card">
                        <div class="header">
                            <?php echo $this->Form->create($users, ['controller' => 'Users','url' => ['action' => 'find']], array(
                                'inputDefaults' => array(
                                    'div' => 'form-group',
                                    'label' => false,
                                    'wrapInput' => false,
                                    'class' => 'form-control'
                                ),
                            )); ?>
                            <div class="body">
                                <div class="row clearfix ">
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            Client
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <select class="form-control show-tick" id="user_id" name="user_id">
                                                <?php foreach ($clients as $user): ?>
                                                    <option value="<?= $user->id; ?>"><?= $user->full_name; ?></option>

                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <?php echo $this->Form->submit('Search', array(
                                            'div' => 'form-group',
                                            'class' => 'btn btn-success btn-lg m-l-15 waves-effect'
                                        )); ?>
                                    </div>
                                </div>
                                <?php echo $this->Form->end(); ?>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?= $this->Element('nav', ['links' => $links_array, 'title' => 'TENANTS']); ?>

    <table cellpadding="0" cellspacing="0"
           class="table table-bordered table-striped table-hover dataTable js-exportable">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th style="display: none" scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
            <th scope="col"><?= $this->Paginator->sort('email') ?></th>
            <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
            <th scope="col"><?= $this->Paginator->sort('address') ?></th>
            <th scope="col"><?= $this->Paginator->sort('active') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>


            <th scope="col"><?= $this->Paginator->sort('title') ?></th>
            <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Landlord') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php $ct = 1;
        foreach ($users as $user): ?>
            <tr>
                <td><?= $ct++ ?></td>
                <td style="display: none"><?= h($user->id) ?></td>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->last_name) ?></td>
                <td><?= h($user->contact) ?></td>
                <td><?= h($user->email) ?></td>
                <td>
                    <?php

                    if (h($user->photo == "")) {
                        ?>
                        <img src="<?= $this->Url->image('user.png'); ?>" alt="User"/>
                        <?php
                    } else {
                        ?>
                        <img src="<?= $user->full_url; ?>" alt="photo"/>
                        <?php
                    }
                    ?>
                </td>

                <td><?= h($user->address) ?></td>

                <td><?= h($user->active) ?></td>
                <td><?= h($user->created_at) ?></td>


                <td><?= h($user->title) ?></td>
                <td><?= $user->has('company') ? $this->Html->link($user->company->name,
                        ['controller' => 'Companies', 'action' => 'view', $user->company->id]) : '' ?></td>
                <td><?= h($user->landlord->full_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


</div>

<?= $this->element('tableScripts') ?>
