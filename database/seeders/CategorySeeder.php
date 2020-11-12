<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mockups/categories.json');
        $data = json_decode($json);
        foreach ($data as $obj) {
            Category::create([
                'id' => $obj->id,
                'title' => $obj->title,
                'metaTitle' => $obj->metaTitle,
                'slug' => $obj->slug,
                'content' => $obj->content,
            ]);
        }
    }
}
