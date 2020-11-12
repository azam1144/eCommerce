<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = Auth::user();
        dd($user);
//        $this->call(CategorySeeder::class);
//        $this->call(ProductSeeder::class);
    }
}
