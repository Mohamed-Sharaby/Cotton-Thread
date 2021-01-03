<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Banner;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//         Category::factory(4)->create();
//         SubCategory::factory(4)->create();
//         Product::factory(4)->create();
         Banner::factory(4)->create();
    }
}
