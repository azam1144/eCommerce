<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mockups/products.json');
        $data = json_decode($json);
        $categoryIds = [9010, 9011, 9012, 9013, 9014, 9015, 9016, 9017];
        foreach ($data as $obj) {
            $product = Product::create([
                'id' => $obj->id,
                'title' => $obj->title,
                'metaTitle' => $obj->metaTitle,
                'slug' => $obj->slug,
                'summary' => $obj->summary,
                'sku' => $obj->sku,
                'price' => $obj->price,
                'discount' => $obj->discount,
                'quantity' => $obj->quantity,
                'content' => $obj->content
            ]);

            $product->categories()->attach(Arr::random($categoryIds));
        }
    }
}
