<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShopifyAppReviewsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShopifyAppReviewsTable Test Case
 */
class ShopifyAppReviewsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ShopifyAppReviewsTable
     */
    public $ShopifyAppReviews;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.shopify_app_reviews'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ShopifyAppReviews') ? [] : ['className' => ShopifyAppReviewsTable::class];
        $this->ShopifyAppReviews = TableRegistry::getTableLocator()->get('ShopifyAppReviews', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ShopifyAppReviews);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
