<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 */
class OrdersFixture extends TestFixture
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
                'date' => '2023-12-18',
                'status' => 'Lorem ipsum dolor sit amet',
                'total' => 1.5,
                'customer_id' => 1,
            ],
        ];
        parent::init();
    }
}
