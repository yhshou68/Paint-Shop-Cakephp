<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PaintsStoragesFixture
 */
class PaintsStoragesFixture extends TestFixture
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
                'paint_id' => 1,
                'storage_id' => 1,
                'start_date' => '2023-12-18',
                'end_date' => '2023-12-18',
            ],
        ];
        parent::init();
    }
}
