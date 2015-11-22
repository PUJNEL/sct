<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Steptype'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Steps'), ['controller' => 'Steps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Step'), ['controller' => 'Steps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="steptypes index large-9 medium-8 columns content">
    <h3><?= __('Steptypes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('detail') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($steptypes as $steptype): ?>
            <tr>
                <td><?= $this->Number->format($steptype->id) ?></td>
                <td><?= h($steptype->name) ?></td>
                <td><?= h($steptype->detail) ?></td>
                <td><?= h($steptype->created) ?></td>
                <td><?= h($steptype->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $steptype->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $steptype->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $steptype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $steptype->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
