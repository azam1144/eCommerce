<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ProductReview.
 */
class ProductReview extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id', 'parentId', 'title', 'rating',  'published', 'content'];


    /**
     * Get the reviews that owns by a review.
     */
    function reviews(){
        return $this->hasMany('App\Models\ProductReview', 'parentId');
    }


    /**
     * Get the product that owns the reviews.
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
