<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shipment $shipment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Shipment'), ['action' => 'edit', $shipment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Shipment'), ['action' => 'delete', $shipment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shipment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Shipments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Shipment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="shipments view content">
            <h3><?= h($shipment->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Customer') ?></th>
                    <td><?= $shipment->hasValue('customer') ? $this->Html->link($shipment->customer->name, ['controller' => 'Customers', 'action' => 'view', $shipment->customer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($shipment->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($shipment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seq Num') ?></th>
                    <td><?= $this->Number->format($shipment->seq_num) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
