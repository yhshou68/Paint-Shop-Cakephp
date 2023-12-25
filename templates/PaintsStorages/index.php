<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\PaintsStorage> $paintsStorages
 */
?>
<div class="paintsStorages index content">
    <?= $this->Html->link(__('New Paints Storage'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Paints Storages') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('paint_id') ?></th>
                    <th><?= $this->Paginator->sort('storage_id') ?></th>
                    <th><?= $this->Paginator->sort('start_date') ?></th>
                    <th><?= $this->Paginator->sort('end_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($paintsStorages as $paintsStorage): ?>
                <tr>
                    <td><?= $this->Number->format($paintsStorage->id) ?></td>
                    <td><?= $paintsStorage->hasValue('paint') ? $this->Html->link($paintsStorage->paint->name, ['controller' => 'Paints', 'action' => 'view', $paintsStorage->paint->id]) : '' ?></td>
                    <td><?= $paintsStorage->hasValue('storage') ? $this->Html->link($paintsStorage->storage->id, ['controller' => 'Storages', 'action' => 'view', $paintsStorage->storage->id]) : '' ?></td>
                    <td><?= h($paintsStorage->start_date) ?></td>
                    <td><?= h($paintsStorage->end_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $paintsStorage->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $paintsStorage->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $paintsStorage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paintsStorage->id)]) ?>
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
