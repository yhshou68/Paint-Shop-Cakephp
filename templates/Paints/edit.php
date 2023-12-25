<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paint $paint
 * @var string[]|\Cake\Collection\CollectionInterface $orders
 * @var string[]|\Cake\Collection\CollectionInterface $storages
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $paint->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $paint->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Paints'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="paints form content">
            <?= $this->Form->create($paint) ?>
            <fieldset>
                <legend><?= __('Edit Paint') ?></legend>
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
