<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Appointment'), ['action' => 'edit', $appointment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Appointment'), ['action' => 'delete', $appointment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appointment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Appointments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Appointment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Turns'), ['controller' => 'Turns', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Turn'), ['controller' => 'Turns', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appointments view large-9 medium-8 columns content">
    <h3><?= h($appointment->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $appointment->has('user') ? $this->Html->link($appointment->user->id, ['controller' => 'Users', 'action' => 'view', $appointment->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($appointment->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Detail') ?></th>
            <td><?= h($appointment->detail) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($appointment->date) ?></td>
        </tr>
        <tr>
            <th><?= __('State') ?></th>
            <td><?= h($appointment->state) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($appointment->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($appointment->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($appointment->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Patient Id') ?></th>
            <td><?= $this->Number->format($appointment->patient_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Payed') ?></th>
            <td><?= $appointment->payed ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $appointment->active ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Turns') ?></h4>
        <?php if (!empty($appointment->turns)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Appointment Id') ?></th>
                <th><?= __('Cashier Id') ?></th>
                <th><?= __('State') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($appointment->turns as $turns): ?>
            <tr>
                <td><?= h($turns->id) ?></td>
                <td><?= h($turns->appointment_id) ?></td>
                <td><?= h($turns->cashier_id) ?></td>
                <td><?= h($turns->state) ?></td>
                <td><?= h($turns->created) ?></td>
                <td><?= h($turns->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Turns', 'action' => 'view', $turns->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Turns', 'action' => 'edit', $turns->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Turns', 'action' => 'delete', $turns->id], ['confirm' => __('Are you sure you want to delete # {0}?', $turns->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
