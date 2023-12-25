<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Shipment Entity
 *
 * @property int $id
 * @property int $seq_num
 * @property int|null $customer_id
 * @property string|null $type
 *
 * @property \App\Model\Entity\Customer $customer
 */
class Shipment extends Entity
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
        'seq_num' => true,
        'customer_id' => true,
        'type' => true,
        'customer' => true,
    ];
}
