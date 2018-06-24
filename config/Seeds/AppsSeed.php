<?php
use Migrations\AbstractSeed;

/**
 * Apps seed.
 */
class AppsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
			// Sedding
			$appsList = [
				'product-upsell',
				'product-discount',
				'store-locator',
				'product-options',
				'quantity-breaks',
				'product-bundles',
				'customer-pricing',
				'product-builder',
				'social-triggers',
				'recurring-orders',
				'multi-currency',
				'quickbooks-online',
				'xero',
				'the-bold-brain'
			];

			$insertList = array_map(
				function ($slug) {
					return [
						'shopify_domain' => $slug,
						'app_slug' => $slug,
						'created_at' => '2018-06-23 11:00:00'
					];
				},
				$appsList
			);

			$this->table('shopify_app_reviews')
				->insert($insertList)
				->saveData();
    }
}
