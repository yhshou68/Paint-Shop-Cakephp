<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PaintsStorage $paintsStorage
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Paints Storage'), ['action' => 'edit', $paintsStorage->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Paints Storage'), ['action' => 'delete', $paintsStorage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paintsStorage->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Paints Storages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Paints Storage'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="paintsStorages view content">
            <h3><?= h($paintsStorage->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Paint') ?></th>
                    <td><?= $paintsStorage->hasValue('paint') ? $this->Html->link($paintsStorage->paint->name, ['controller' => 'Paints', 'action' => 'view', $paintsStorage->paint->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Storage') ?></th>
                    <td><?= $paintsStorage->hasValue('storage') ? $this->Html->link($paintsStorage->storage->id, ['controller' => 'Storages', 'action' => 'view', $paintsStorage->storage->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($paintsStorage->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Date') ?></th>
                    <td><?= h($paintsStorage->start_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Date') ?></th>
                    <td><?= h($paintsStorage->end_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
