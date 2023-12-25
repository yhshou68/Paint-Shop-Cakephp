<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrdersPaintsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrdersPaintsTable Test Case
 */
class OrdersPaintsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrdersPaintsTable
     */
    protected $OrdersPaints;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.OrdersPaints',
        'app.Orders',
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
        $config = $this->getTableLocator()->exists('OrdersPaints') ? [] : ['className' => OrdersPaintsTable::class];
        $this->OrdersPaints = $this->getTableLocator()->get('OrdersPaints', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->OrdersPaints);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OrdersPaintsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\OrdersPaintsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
