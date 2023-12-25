<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ShipmentsFixture
 */
class ShipmentsFixture extends TestFixture
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
                'seq_num' => 1,
                'customer_id' => 1,
                'type' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
