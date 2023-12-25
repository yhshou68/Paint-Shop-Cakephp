<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Storage $storage
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Storage'), ['action' => 'edit', $storage->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Storage'), ['action' => 'delete', $storage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storage->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Storages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Storage'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="storages view content">
            <h3><?= h($storage->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Location') ?></th>
                    <td><?= h($storage->location) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($storage->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Capacity') ?></th>
                    <td><?= $storage->capacity === null ? '' : $this->Number->format($storage->capacity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Warning Threshold') ?></th>
                    <td><?= $storage->warning_threshold === null ? '' : $this->Number->format($storage->warning_threshold) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Paints') ?></h4>
                <?php if (!empty($storage->paints)) : ?>
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
                        <?php foreach ($storage->paints as $paints) : ?>
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
