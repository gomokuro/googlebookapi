<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SearchBookHistoriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SearchBookHistoriesTable Test Case
 */
class SearchBookHistoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SearchBookHistoriesTable
     */
    protected $SearchBookHistories;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.SearchBookHistories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SearchBookHistories') ? [] : ['className' => SearchBookHistoriesTable::class];
        $this->SearchBookHistories = $this->getTableLocator()->get('SearchBookHistories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->SearchBookHistories);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SearchBookHistoriesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
