<?php
/**
* CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
* @link      https://cakephp.org CakePHP(tm) Project
* @since     0.2.9
* @license   https://opensource.org/licenses/mit-license.php MIT License
*/
namespace App\Controller;

use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
* Static content controller
*
* This controller will render views from Template/Pages/
*
* @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
*/
class PagesController extends AppController
{
	public function initialize()
	{
		$this->loadModel('ShopifyAppReviews');
	}
	public function index()
	{
		$search = trim((string) $this->request->getQuery('q'));

		// Get app Apps by Slug name
		$apps = $this->ShopifyAppReviews->find()
			->order(['ShopifyAppReviews.app_slug']);

		if ($search) {
			$apps->where(function (QueryExpression $exp, Query $q) use ($search){
        return $exp->like('ShopifyAppReviews.app_slug', "%{$search}%");
    	});
		}

		$this->set([
			'search' => $search,
			'apps' => $apps->toArray()
		]);
	}
}
