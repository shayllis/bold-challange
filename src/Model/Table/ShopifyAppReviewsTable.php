<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShopifyAppReviews Model
 *
 * @method \App\Model\Entity\ShopifyAppReview get($primaryKey, $options = [])
 * @method \App\Model\Entity\ShopifyAppReview newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ShopifyAppReview[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ShopifyAppReview|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShopifyAppReview|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShopifyAppReview patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ShopifyAppReview[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ShopifyAppReview findOrCreate($search, callable $callback = null, $options = [])
 */
class ShopifyAppReviewsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('shopify_app_reviews');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

				$this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'created_at' => 'new',
                    'updated_at' => 'always'
                ]
            ]
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('shopify_domain')
            ->maxLength('shopify_domain', 255)
            ->requirePresence('shopify_domain', 'create')
            ->notEmpty('shopify_domain');

        $validator
            ->scalar('app_slug')
            ->maxLength('app_slug', 255)
            ->requirePresence('app_slug', 'create')
            ->notEmpty('app_slug');

        $validator
            ->integer('star_rating')
            ->allowEmpty('star_rating');

        $validator
            ->integer('previous_star_rating')
            ->allowEmpty('previous_star_rating');

        $validator
            ->dateTime('updated_at')
            ->allowEmpty('updated_at');

        $validator
            ->dateTime('created_at')
            ->allowEmpty('created_at');

        return $validator;
    }
}
