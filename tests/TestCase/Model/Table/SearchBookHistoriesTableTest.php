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


    public function testInsertHistory() :void
    {
        $dummySearchWord = '夏目漱石';
        $jsonstr = '[{"kind":"books#volume","id":"IbKxAAAAIAAJ","etag":"50uX/K7oeaA","selfLink":"https://www.googleapis.com/books/v1/volumes/IbKxAAAAIAAJ","volumeInfo":{"title":"決定版夏目漱石","authors":["江藤淳"]}}]';
        $data = json_decode($jsonstr);
        
        $this->SearchBookHistories->insertHistory($dummySearchWord, $data);

        $entity = $this->SearchBookHistories->find()->where(['search_word'=>$dummySearchWord])->first();

        $resultJsonstr =  json_encode($entity->search_result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        $this->assertEquals($jsonstr, $resultJsonstr);

    }


}
