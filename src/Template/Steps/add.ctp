<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Steps'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Turns'), ['controller' => 'Turns', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Turn'), ['controller' => 'Turns', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Steptypes'), ['controller' => 'Steptypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Steptype'), ['controller' => 'Steptypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="steps form large-9 medium-8 columns content">
    <?= $this->Form->create($step) ?>
    <fieldset>
        <legend><?= __('Add Step') ?></legend>
        <?php
            echo $this->Form->input('turn_id', ['options' => $turns]);
            echo $this->Form->input('steptype_id', ['options' => $steptypes]);
            echo $this->Form->input('startdatetime');
            echo $this->Form->input('enddatetime');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
