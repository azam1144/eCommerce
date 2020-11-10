<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Product.
 *
 * @package namespace App\Models;
 */
class Product extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'metaTitle', 'slug', 'summary', 'sku', 'price', 'discount', 'quantity', 'content'];

    /**
     * Get the user that owns the products.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * The categories that belong to the product.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    /**
     * The order that belongs to the product.
     */
    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }

    /**
     * Get the reviews for the product.
     */
    public function productReviews()
    {
        return $this->hasMany('App\Models\ProductReview');
    }
}
