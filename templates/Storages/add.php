<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Storage $storage
 * @var \Cake\Collection\CollectionInterface|string[] $paints
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Storages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="storages form content">
            <?= $this->Form->create($storage) ?>
            <fieldset>
                <legend><?= __('Add Storage') ?></legend>
                <?php
                    echo $this->Form->control('location');
                    echo $this->Form->control('capacity');
                    echo $this->Form->control('warning_threshold');
                    echo $this->Form->control('paints._ids', ['options' => $paints]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
