<?php
namespace App\Controller;

use App\Controller\AppController;

/**
* Services Controller
*
*
* @method \App\Model\Entity\Service[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
*/
use Cake\Http\Client;

class ServicesController extends AppController
{
	private $endPoint = 'https://apps.shopify.com/{APPNAME}/reviews.json';
	/**
	* Index method
	*
	* @return \Cake\Http\Response|void
	*/

	public function initialize()
	{
		$this->loadModel('ShopifyAppReviews');
		$this->autoRender = false;
	}

	public function index()
	{
		// Get app apps
		$apps = $this->ShopifyAppReviews->find()->toArray();

		$http = new Client();

		// Demo Data
		// $reviews = [
		// 	"overall_rating" =>  5,
		// 	"reviews" =>  [
		// 		[
		// 			"author" =>  null,
		// 			"body" =>  "Support was quick and easy. There is NO other app that have the total functionality of this app. A must for any serious seller!!",
		// 			"created_at" =>  "2018-06-21T02:38:27.000-04:00",
		// 			"shop_domain" =>  "backpack-adventures.myshopify.com",
		// 			"shop_name" =>  "Backpack Adventures",
		// 			"star_rating" =>  5
		// 		],
		// 		[
		// 			"author" =>  null,
		// 			"body" =>  "It is simple, a morning, I said ok let find an app for upsell for my Shopify store... When I saw there is a bold app for that, as I used bold options from 9 months, I took their upsell app..\r\nInstalled and configured at 8am, first upsell sales at 11am... Amazing app from an amazing team. Thanks guys\r\n\r\nLast year, I had a wonderful experience with bold support  these team is amazing, really !! Even during trial period for an app @ $9, was like I fought a dream car @ 200K...\r\n",
		// 			"created_at" =>  "2018-06-20T17:18:09.000-04:00",
		// 			"shop_domain" =>  "luxebackyard.myshopify.com",
		// 			"shop_name" =>  "Luxebackyard",
		// 			"star_rating" =>  5
		// 		],
		// 		[
		// 			"author" =>  null,
		// 			"body" =>  "I'm soo glad this app is available! Put a huge grin on my face the moment it worked, because I know the power of upsells. This app basically adds a funnel-like feature to your site. And you don't have to pay $100 a month. Some of you know what I'm talking about.\r\nI highly recommend this. And somehow I get SEO for writing this. Haven't had much time to learn about SEO yet as theres so much to learn. But its on my list.\r\n\r\nwww.BeemansHome.com  Modern home d\u00e9cor, simplified. ",
		// 			"created_at" =>  "2018-06-16T19:07:00.000-04:00",
		// 			"shop_domain" =>  "beemans-home.myshopify.com",
		// 			"shop_name" =>  "Beemans Home",
		// 			"star_rating" =>  5
		// 		],
		// 		[
		// 			"author" =>  null,
		// 			"body" =>  "I love this application to offer other similar products to my buyers. Easy to manage, create different options. Once I needed help, but Parminder solved my issue quickly. Thank you very much!",
		// 			"created_at" =>  "2018-06-14T12:21:27.000-04:00",
		// 			"shop_domain" =>  "beauty-gift-cards.myshopify.com",
		// 			"shop_name" =>  "Beauty Gift Cards",
		// 			"star_rating" =>  5
		// 		],
		// 		[
		// 			"author" =>  null,
		// 			"body" =>  "Very helpful and it easy to install ",
		// 			"created_at" =>  "2018-06-12T18:54:45.000-04:00",
		// 			"shop_domain" =>  "skulls-attitude.myshopify.com",
		// 			"shop_name" =>  "Skulls Attitude",
		// 			"star_rating" =>  5
		// 		]
		// 	]
		// ];

		foreach ($apps as $app){
			$reviews = $http->get(str_replace('{APPNAME}', $app->shopify_domain, $this->endPoint))->json;
			if (empty($reviews['reviews'])) {
				continue;
			}

			// Read stars Rating and update it
			$app->set('previous_star_rating', $app->getOriginal('star_rating'));
			$app->set('star_rating', (int) (array_sum(array_column($reviews['reviews'], 'star_rating'))/count($reviews['reviews'])));
			$this->ShopifyAppReviews->save($app);
			// Note that dates are self updated by Behavior
		}

		$this->set(compact('services'));
	}
}
