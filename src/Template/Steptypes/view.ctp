<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Steptype'), ['action' => 'edit', $steptype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Steptype'), ['action' => 'delete', $steptype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $steptype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Steptypes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Steptype'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Steps'), ['controller' => 'Steps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Step'), ['controller' => 'Steps', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="steptypes view large-9 medium-8 columns content">
    <h3><?= h($steptype->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($steptype->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Detail') ?></th>
            <td><?= h($steptype->detail) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($steptype->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($steptype->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($steptype->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Steps') ?></h4>
        <?php if (!empty($steptype->steps)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Turn Id') ?></th>
                <th><?= __('Steptype Id') ?></th>
                <th><?= __('Startdatetime') ?></th>
                <th><?= __('Enddatetime') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($steptype->steps as $steps): ?>
            <tr>
                <td><?= h($steps->id) ?></td>
                <td><?= h($steps->turn_id) ?></td>
                <td><?= h($steps->steptype_id) ?></td>
                <td><?= h($steps->startdatetime) ?></td>
                <td><?= h($steps->enddatetime) ?></td>
                <td><?= h($steps->created) ?></td>
                <td><?= h($steps->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Steps', 'action' => 'view', $steps->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Steps', 'action' => 'edit', $steps->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Steps', 'action' => 'delete', $steps->id], ['confirm' => __('Are you sure you want to delete # {0}?', $steps->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
