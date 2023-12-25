<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StoragesFixture
 */
class StoragesFixture extends TestFixture
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
                'location' => 'Lorem ipsum dolor sit amet',
                'capacity' => 1,
                'warning_threshold' => 1,
            ],
        ];
        parent::init();
    }
}
