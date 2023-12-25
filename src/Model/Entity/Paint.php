<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Paint Entity
 *
 * @property int $id
 * @property string|null $color
 * @property string|null $type
 * @property string|null $name
 * @property string|null $description
 * @property string|null $price
 *
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\Storage[] $storages
 */
class Paint extends Entity
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
        'color' => true,
        'type' => true,
        'name' => true,
        'description' => true,
        'price' => true,
        'orders' => true,
        'storages' => true,
    ];
}
