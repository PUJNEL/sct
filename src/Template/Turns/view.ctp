<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Turn'), ['action' => 'edit', $turn->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Turn'), ['action' => 'delete', $turn->id], ['confirm' => __('Are you sure you want to delete # {0}?', $turn->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Turns'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Turn'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Appointments'), ['controller' => 'Appointments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Appointment'), ['controller' => 'Appointments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Steps'), ['controller' => 'Steps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Step'), ['controller' => 'Steps', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="turns view large-9 medium-8 columns content">
    <h3><?= h($turn->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Appointment') ?></th>
            <td><?= $turn->has('appointment') ? $this->Html->link($turn->appointment->name, ['controller' => 'Appointments', 'action' => 'view', $turn->appointment->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $turn->has('user') ? $this->Html->link($turn->user->id, ['controller' => 'Users', 'action' => 'view', $turn->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('State') ?></th>
            <td><?= h($turn->state) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($turn->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($turn->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($turn->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Steps') ?></h4>
        <?php if (!empty($turn->steps)): ?>
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
            <?php foreach ($turn->steps as $steps): ?>
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
