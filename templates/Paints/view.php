<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paint $paint
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Paint'), ['action' => 'edit', $paint->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Paint'), ['action' => 'delete', $paint->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paint->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Paints'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Paint'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="paints view content">
            <h3><?= h($paint->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Color') ?></th>
                    <td><?= h($paint->color) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($paint->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($paint->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($paint->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $paint->price === null ? '' : $this->Number->format($paint->price) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($paint->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Orders') ?></h4>
                <?php if (!empty($paint->orders)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Total') ?></th>
                            <th><?= __('Customer Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($paint->orders as $orders) : ?>
                        <tr>
                            <td><?= h($orders->id) ?></td>
                            <td><?= h($orders->date) ?></td>
                            <td><?= h($orders->status) ?></td>
                            <td><?= h($orders->total) ?></td>
                            <td><?= h($orders->customer_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Storages') ?></h4>
                <?php if (!empty($paint->storages)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Location') ?></th>
                            <th><?= __('Capacity') ?></th>
                            <th><?= __('Warning Threshold') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($paint->storages as $storages) : ?>
                        <tr>
                            <td><?= h($storages->id) ?></td>
                            <td><?= h($storages->location) ?></td>
                            <td><?= h($storages->capacity) ?></td>
                            <td><?= h($storages->warning_threshold) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Storages', 'action' => 'view', $storages->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Storages', 'action' => 'edit', $storages->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Storages', 'action' => 'delete', $storages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storages->id)]) ?>
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
