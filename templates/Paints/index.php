<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Paint> $paints
 */
?>
<div class="paints index content">
    <?= $this->Html->link(__('New Paint'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Paints') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('color') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($paints as $paint): ?>
                <tr>
                    <td><?= $this->Number->format($paint->id) ?></td>
                    <td><?= h($paint->color) ?></td>
                    <td><?= h($paint->type) ?></td>
                    <td><?= h($paint->name) ?></td>
                    <td><?= $paint->price === null ? '' : $this->Number->format($paint->price) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $paint->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $paint->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $paint->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paint->id)]) ?>
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
