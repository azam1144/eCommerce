<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Images.
 *
 * @package namespace App\Models;
 */
class Images extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'product_id'];

    /**
     * Get the product that owns the images.
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
