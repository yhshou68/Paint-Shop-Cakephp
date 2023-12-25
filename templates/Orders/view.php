<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="orders view content">
            <h3><?= h($order->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($order->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer') ?></th>
                    <td><?= $order->hasValue('customer') ? $this->Html->link($order->customer->name, ['controller' => 'Customers', 'action' => 'view', $order->customer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($order->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total') ?></th>
                    <td><?= $order->total === null ? '' : $this->Number->format($order->total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($order->date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Paints') ?></h4>
                <?php if (!empty($order->paints)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Color') ?></th>
                            <th><?= __('Type') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Price') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($order->paints as $paints) : ?>
                        <tr>
                            <td><?= h($paints->id) ?></td>
                            <td><?= h($paints->color) ?></td>
                            <td><?= h($paints->type) ?></td>
                            <td><?= h($paints->name) ?></td>
                            <td><?= h($paints->description) ?></td>
                            <td><?= h($paints->price) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Paints', 'action' => 'view', $paints->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Paints', 'action' => 'edit', $paints->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Paints', 'action' => 'delete', $paints->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paints->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
