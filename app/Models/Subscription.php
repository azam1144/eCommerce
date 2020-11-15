<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Subscription.
 *
 * @package namespace App\Models;
 */
class Subscription extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['plan', 'plan_price', 'interest', 'user_id', 'order_id'];


    /**
     * Get the order that owns the subscription.
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    /**
     * The users that belong to the subscription.
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
