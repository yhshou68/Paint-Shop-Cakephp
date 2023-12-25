<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Storage> $storages
 */
?>
<div class="storages index content">
    <?= $this->Html->link(__('New Storage'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Storages') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('location') ?></th>
                    <th><?= $this->Paginator->sort('capacity') ?></th>
                    <th><?= $this->Paginator->sort('warning_threshold') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($storages as $storage): ?>
                <tr>
                    <td><?= $this->Number->format($storage->id) ?></td>
                    <td><?= h($storage->location) ?></td>
                    <td><?= $storage->capacity === null ? '' : $this->Number->format($storage->capacity) ?></td>
                    <td><?= $storage->warning_threshold === null ? '' : $this->Number->format($storage->warning_threshold) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $storage->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storage->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storage->id)]) ?>
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
