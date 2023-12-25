<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StoragesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StoragesTable Test Case
 */
class StoragesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StoragesTable
     */
    protected $Storages;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Storages',
        'app.Paints',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Storages') ? [] : ['className' => StoragesTable::class];
        $this->Storages = $this->getTableLocator()->get('Storages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Storages);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StoragesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
