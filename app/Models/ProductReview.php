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
    protected $fillable = ['productId', 'parentId', 'title', 'rating',  'published', 'content'];


    /**
     * Get the product that owns the reviews.
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
