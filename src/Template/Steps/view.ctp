<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Step'), ['action' => 'edit', $step->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Step'), ['action' => 'delete', $step->id], ['confirm' => __('Are you sure you want to delete # {0}?', $step->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Steps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Step'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Turns'), ['controller' => 'Turns', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Turn'), ['controller' => 'Turns', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Steptypes'), ['controller' => 'Steptypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Steptype'), ['controller' => 'Steptypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="steps view large-9 medium-8 columns content">
    <h3><?= h($step->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Turn') ?></th>
            <td><?= $step->has('turn') ? $this->Html->link($step->turn->id, ['controller' => 'Turns', 'action' => 'view', $step->turn->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Steptype') ?></th>
            <td><?= $step->has('steptype') ? $this->Html->link($step->steptype->name, ['controller' => 'Steptypes', 'action' => 'view', $step->steptype->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($step->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Startdatetime') ?></th>
            <td><?= h($step->startdatetime) ?></td>
        </tr>
        <tr>
            <th><?= __('Enddatetime') ?></th>
            <td><?= h($step->enddatetime) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($step->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($step->modified) ?></td>
        </tr>
    </table>
</div>
