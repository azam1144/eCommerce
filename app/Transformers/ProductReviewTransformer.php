<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\ProductReview;

/**
 * Class ProductReviewTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProductReviewTransformer extends TransformerAbstract
{
    /**
     * Transform the ProductReview entity.
     *
     * @param \App\Entities\ProductReview $model
     *
     * @return array
     */
    public function transform(ProductReview $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
