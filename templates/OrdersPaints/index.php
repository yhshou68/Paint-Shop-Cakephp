<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\OrdersPaint> $ordersPaints
 */
?>
<div class="ordersPaints index content">
    <?= $this->Html->link(__('New Orders Paint'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Orders Paints') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('order_id') ?></th>
                    <th><?= $this->Paginator->sort('paint_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('subtotal') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ordersPaints as $ordersPaint): ?>
                <tr>
                    <td><?= $this->Number->format($ordersPaint->id) ?></td>
                    <td><?= $ordersPaint->hasValue('order') ? $this->Html->link($ordersPaint->order->id, ['controller' => 'Orders', 'action' => 'view', $ordersPaint->order->id]) : '' ?></td>
                    <td><?= $ordersPaint->hasValue('paint') ? $this->Html->link($ordersPaint->paint->name, ['controller' => 'Paints', 'action' => 'view', $ordersPaint->paint->id]) : '' ?></td>
                    <td><?= $ordersPaint->quantity === null ? '' : $this->Number->format($ordersPaint->quantity) ?></td>
                    <td><?= $ordersPaint->subtotal === null ? '' : $this->Number->format($ordersPaint->subtotal) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ordersPaint->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ordersPaint->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ordersPaint->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordersPaint->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
