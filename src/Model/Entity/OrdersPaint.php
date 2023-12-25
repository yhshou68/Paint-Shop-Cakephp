<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrdersPaint Entity
 *
 * @property int $id
 * @property int $order_id
 * @property int $paint_id
 * @property int|null $quantity
 * @property string|null $subtotal
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\Paint $paint
 */
class OrdersPaint extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'order_id' => true,
        'paint_id' => true,
        'quantity' => true,
        'subtotal' => true,
        'order' => true,
        'paint' => true,
    ];
}
