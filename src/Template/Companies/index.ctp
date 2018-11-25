<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company[]|\Cake\Collection\CollectionInterface $companies
 */
$links_array = [
    ['List Companies', ['action' => 'index']],
    ['New Company', ['action' => 'add']],
    ['List Branches', ['controller' => 'Branches', 'action' => 'index']],
    ['New Branch', ['controller' => 'Branches', 'action' => 'add']]
];
?>

<div class="companies index large-9 medium-8 columns content">
    <?= $this->Element('nav',['links'=>$links_array,'title'=>'Companies']);   ?>
    <table cellpadding="0" cellspacing="0" class="table">
        <thead>
            <tr>

                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_dir') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($companies as $company): ?>
            <tr>

                <td><?= h($company->name) ?></td>
                <td><?= h($company->address) ?></td>
                <td>
                    <?php

                    if (h($company->photo==""))
                    {
                        ?>
                        <img  src="webroot\img\user.png"  alt="User"/>
                        <?php
                    }
                    else{
                        ?>
                        <img  src="<?= $company->full_url; ?>"   alt="photo"/>
                        <?php
                    }
                    ?>
                </td>
                <td><?= h($company->photo_dir) ?></td>
                <td><?= h($company->photo_size) ?></td>
                <td><?= h($company->photo_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $company->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $company->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $company->id], ['confirm' => __('Are you sure you want to delete # {0}?', $company->id)]) ?>
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
