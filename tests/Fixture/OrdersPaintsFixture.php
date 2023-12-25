<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersPaintsFixture
 */
class OrdersPaintsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'order_id' => 1,
                'paint_id' => 1,
                'quantity' => 1,
                'subtotal' => 1.5,
            ],
        ];
        parent::init();
    }
}
