<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Order.
 *
 * @package namespace App\Models;
 */
class Order extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'sessionId', 'token', 'status', 'total', 'subTotal', 'discount', 'itemDiscount', 'tax',
        'grandTotal', 'promo', 'content', 'shipping', 'firstName', 'lastName', 'mobile', 'email', 'line1',
        'line2', 'city', 'province', 'country', 'paytabsPageId'
    ];

    /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    /**
     * Get the product that belong to order.
     */
    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    /**
     * Get the transactions for the order.
     */
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }
}
