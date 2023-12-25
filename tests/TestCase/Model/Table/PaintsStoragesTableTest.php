<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PaintsStoragesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PaintsStoragesTable Test Case
 */
class PaintsStoragesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PaintsStoragesTable
     */
    protected $PaintsStorages;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.PaintsStorages',
        'app.Paints',
        'app.Storages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PaintsStorages') ? [] : ['className' => PaintsStoragesTable::class];
        $this->PaintsStorages = $this->getTableLocator()->get('PaintsStorages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PaintsStorages);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PaintsStoragesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PaintsStoragesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
