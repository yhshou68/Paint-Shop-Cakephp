<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PaintsStorage $paintsStorage
 * @var string[]|\Cake\Collection\CollectionInterface $paints
 * @var string[]|\Cake\Collection\CollectionInterface $storages
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $paintsStorage->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $paintsStorage->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Paints Storages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="paintsStorages form content">
            <?= $this->Form->create($paintsStorage) ?>
            <fieldset>
                <legend><?= __('Edit Paints Storage') ?></legend>
                <?php
                    echo $this->Form->control('paint_id', ['options' => $paints]);
                    echo $this->Form->control('storage_id', ['options' => $storages]);
                    echo $this->Form->control('start_date');
                    echo $this->Form->control('end_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
