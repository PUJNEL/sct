<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Steptypes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Steps'), ['controller' => 'Steps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Step'), ['controller' => 'Steps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="steptypes form large-9 medium-8 columns content">
    <?= $this->Form->create($steptype) ?>
    <fieldset>
        <legend><?= __('Add Steptype') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('detail');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
