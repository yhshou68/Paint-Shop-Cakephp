<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdersPaint $ordersPaint
 * @var \Cake\Collection\CollectionInterface|string[] $orders
 * @var \Cake\Collection\CollectionInterface|string[] $paints
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Orders Paints'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ordersPaints form content">
            <?= $this->Form->create($ordersPaint) ?>
            <fieldset>
                <legend><?= __('Add Orders Paint') ?></legend>
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
