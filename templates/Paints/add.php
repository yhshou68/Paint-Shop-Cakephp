<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paint $paint
 * @var \Cake\Collection\CollectionInterface|string[] $orders
 * @var \Cake\Collection\CollectionInterface|string[] $storages
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Paints'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="paints form content">
            <?= $this->Form->create($paint) ?>
            <fieldset>
                <legend><?= __('Add Paint') ?></legend>
                <?php
                    echo $this->Form->control('color');
                    echo $this->Form->control('type');
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('price');
                    echo $this->Form->control('orders._ids', ['options' => $orders]);
                    echo $this->Form->control('storages._ids', ['options' => $storages]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
