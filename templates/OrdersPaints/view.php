<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdersPaint $ordersPaint
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Orders Paint'), ['action' => 'edit', $ordersPaint->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Orders Paint'), ['action' => 'delete', $ordersPaint->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordersPaint->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Orders Paints'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Orders Paint'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ordersPaints view content">
            <h3><?= h($ordersPaint->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Order') ?></th>
                    <td><?= $ordersPaint->hasValue('order') ? $this->Html->link($ordersPaint->order->id, ['controller' => 'Orders', 'action' => 'view', $ordersPaint->order->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Paint') ?></th>
                    <td><?= $ordersPaint->hasValue('paint') ? $this->Html->link($ordersPaint->paint->name, ['controller' => 'Paints', 'action' => 'view', $ordersPaint->paint->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ordersPaint->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $ordersPaint->quantity === null ? '' : $this->Number->format($ordersPaint->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Subtotal') ?></th>
                    <td><?= $ordersPaint->subtotal === null ? '' : $this->Number->format($ordersPaint->subtotal) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
