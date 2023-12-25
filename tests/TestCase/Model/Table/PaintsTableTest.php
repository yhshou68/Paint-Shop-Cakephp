<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PaintsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PaintsTable Test Case
 */
class PaintsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PaintsTable
     */
    protected $Paints;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Paints',
        'app.Orders',
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
        $config = $this->getTableLocator()->exists('Paints') ? [] : ['className' => PaintsTable::class];
        $this->Paints = $this->getTableLocator()->get('Paints', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Paints);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PaintsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
