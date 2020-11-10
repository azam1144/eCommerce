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
     * $table->bigInteger('userId')->unsigned();
    $table->string('title');
    $table->string('metaTitle')->nullable();
    $table->string('slug');
    $table->text('summary')->nullable();
    $table->tinyInteger('type');
    $table->string('sku');
    $table->float('price');
    $table->float('discount');
    $table->tinyInteger('quantity');
    $table->tinyInteger('shop');
    $table->text('content');
     */
    protected $fillable = ['title', 'metaTitle', 'slug', 'summary', 'type', 'sku', 'price', 'discount', 'quantity', 'shop', 'content'];

}
