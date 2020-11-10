<?php

namespace App\Presenters;

use App\Transformers\ProductReviewTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProductReviewPresenter.
 *
 * @package namespace App\Presenters;
 */
class ProductReviewPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProductReviewTransformer();
    }
}
