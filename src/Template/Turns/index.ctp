<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Turn'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Appointments'), ['controller' => 'Appointments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Appointment'), ['controller' => 'Appointments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Steps'), ['controller' => 'Steps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Step'), ['controller' => 'Steps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="turns index large-9 medium-8 columns content">
    <h3><?= __('Turns') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('appointment_id') ?></th>
                <th><?= $this->Paginator->sort('cashier_id') ?></th>
                <th><?= $this->Paginator->sort('state') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($turns as $turn): ?>
            <tr>
                <td><?= $this->Number->format($turn->id) ?></td>
                <td><?= $turn->has('appointment') ? $this->Html->link($turn->appointment->name, ['controller' => 'Appointments', 'action' => 'view', $turn->appointment->id]) : '' ?></td>
                <td><?= $turn->has('user') ? $this->Html->link($turn->user->id, ['controller' => 'Users', 'action' => 'view', $turn->user->id]) : '' ?></td>
                <td><?= h($turn->state) ?></td>
                <td><?= h($turn->created) ?></td>
                <td><?= h($turn->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $turn->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $turn->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $turn->id], ['confirm' => __('Are you sure you want to delete # {0}?', $turn->id)]) ?>
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
