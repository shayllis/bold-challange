<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ShopifyAppReview Entity
 *
 * @property int $id
 * @property string $shopify_domain
 * @property string $app_slug
 * @property int $star_rating
 * @property int $previous_star_rating
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property \Cake\I18n\FrozenTime $created_at
 */
class ShopifyAppReview extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'shopify_domain' => true,
        'app_slug' => true,
        'star_rating' => true,
        'previous_star_rating' => true,
        'updated_at' => true,
        'created_at' => true
    ];
}
