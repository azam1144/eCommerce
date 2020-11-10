<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Category.
 *
 * @package namespace App\Models;
 */
class Category extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['parentId', 'title', 'metaTitle', 'slug', 'content'];


    /**
     * Get the categories that owns by a category.
     */
    function categories(){
        return $this->hasMany('App\Models\Category', 'parentId');
    }

    /**
     * The products that belong to the category.
     */
    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }
}
