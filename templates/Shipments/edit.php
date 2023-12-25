<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shipment $shipment
 * @var string[]|\Cake\Collection\CollectionInterface $customers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $shipment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $shipment->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Shipments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="shipments form content">
            <?= $this->Form->create($shipment) ?>
            <fieldset>
                <legend><?= __('Edit Shipment') ?></legend>
                <?php
                    echo $this->Form->control('seq_num');
                    echo $this->Form->control('customer_id', ['options' => $customers, 'empty' => true]);
                    echo $this->Form->control('type');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
