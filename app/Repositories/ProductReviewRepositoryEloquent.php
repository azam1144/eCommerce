<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProductReviewRepository;
use App\Entities\ProductReview;
use App\Validators\ProductReviewValidator;

/**
 * Class ProductReviewRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProductReviewRepositoryEloquent extends BaseRepository implements ProductReviewRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductReview::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProductReviewValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
