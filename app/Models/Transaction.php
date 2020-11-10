<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Transaction.
 *
 * @package namespace App\Models;
 */
class Transaction extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['userId', 'orderId', 'code', 'type', 'mode', 'status', 'content'];


    /**
     * Get the user that owns the transaction.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    
    /**
     * Get the order that owns the transaction.
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
}
