<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdersPaint $ordersPaint
 * @var string[]|\Cake\Collection\CollectionInterface $orders
 * @var string[]|\Cake\Collection\CollectionInterface $paints
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ordersPaint->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ordersPaint->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Orders Paints'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ordersPaints form content">
            <?= $this->Form->create($ordersPaint) ?>
            <fieldset>
                <legend><?= __('Edit Orders Paint') ?></legend>
                <?php
                    echo $this->Form->control('order_id', ['options' => $orders]);
                    echo $this->Form->control('paint_id', ['options' => $paints]);
                    echo $this->Form->control('quantity');
                    echo $this->Form->control('subtotal');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
