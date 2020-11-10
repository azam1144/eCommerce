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
        'userId', 'sessionId', 'token', 'status', 'total', 'subTotal', 'discount', 'itemDiscount', 'tax',
        'grandTotal', 'promo', 'content', 'shipping', 'firstName', 'lastName', 'mobile', 'email', 'line1',
        'line2', 'city', 'province', 'country'
    ];

}
