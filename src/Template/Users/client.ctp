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
<div class="users index large-12 medium-12 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=>'List Clients/Landlords']);   ?>

    <table cellpadding="0" cellspacing="0"  class="table table-bordered table-striped table-hover dataTable js-exportable">
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
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $ct= 1; foreach ($users as $user): ?>
            <tr>
                <td><?= $ct++ ?></td>
                <td style="display: none"><?= h($user->id) ?></td>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->last_name) ?></td>
                <td><?= h($user->contact) ?></td>
                <td><?= h($user->email) ?></td>
                <td>
                    <?php

                    if (h($user->photo==""))
                    {
                        ?>
                        <img  src="<?= $this->Url->image('user.png'); ?>"  alt="User"/>
                        <?php
                    }
                    else{
                        ?>
                        <img  src="<?= $user->full_url; ?>"   alt="photo"/>
                        <?php
                    }
                    ?>
                </td>

                <td><?= h($user->address) ?></td>

                <td><?= h($user->active) ?></td>
                <td><?= h($user->created_at) ?></td>


                <td><?= h($user->title) ?></td>
                <td><?= $user->has('company') ? $this->Html->link($user->company->name, ['controller' => 'Companies', 'action' => 'view', $user->company->id]) : '' ?></td>
                <td><?= h($user->first_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>

</div>

