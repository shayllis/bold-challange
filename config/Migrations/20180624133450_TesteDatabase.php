<?php
use Migrations\AbstractMigration;

class TesteDatabase extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
			// Create challange table (PrimaryKey is auto created)
			$this->table('shopify_app_reviews')
				->addColumn('shopify_domain', 'string', ['limit' => 255])
				->addColumn('app_slug', 'string', ['limit' => 255])
				->addColumn('star_rating', 'integer', ['null' => true])
				->addColumn('previous_star_rating', 'integer', ['null' => true])
				->addColumn('updated_at', 'datetime', ['null' => true])
				->addColumn('created_at', 'datetime', ['null' => true])
				->addIndex('shopify_domain', ['unique' => true])
				->addIndex('app_slug', ['unique' => true])
				->create();
    }
}
