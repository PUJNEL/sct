<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Step'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Turns'), ['controller' => 'Turns', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Turn'), ['controller' => 'Turns', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Steptypes'), ['controller' => 'Steptypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Steptype'), ['controller' => 'Steptypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="steps index large-9 medium-8 columns content">
    <h3><?= __('Steps') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('turn_id') ?></th>
                <th><?= $this->Paginator->sort('steptype_id') ?></th>
                <th><?= $this->Paginator->sort('startdatetime') ?></th>
                <th><?= $this->Paginator->sort('enddatetime') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($steps as $step): ?>
            <tr>
                <td><?= $this->Number->format($step->id) ?></td>
                <td><?= $step->has('turn') ? $this->Html->link($step->turn->id, ['controller' => 'Turns', 'action' => 'view', $step->turn->id]) : '' ?></td>
                <td><?= $step->has('steptype') ? $this->Html->link($step->steptype->name, ['controller' => 'Steptypes', 'action' => 'view', $step->steptype->id]) : '' ?></td>
                <td><?= h($step->startdatetime) ?></td>
                <td><?= h($step->enddatetime) ?></td>
                <td><?= h($step->created) ?></td>
                <td><?= h($step->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $step->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $step->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $step->id], ['confirm' => __('Are you sure you want to delete # {0}?', $step->id)]) ?>
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
