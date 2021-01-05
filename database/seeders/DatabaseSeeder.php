<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\City;
use App\Models\District;
use App\Models\Favourite;
use App\Models\Gallery;
use App\Models\ProductColor;
use App\Models\ProductQuantity;
use App\Models\ProductSize;
use App\Models\Region;
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
//         ProductColor::factory(4)->create();
//         ProductSize::factory(4)->create();
//         ProductQuantity::factory(4)->create();
//         Banner::factory(4)->create();

//        Banner::factory(4)->create();
//        Favourite::factory(4)->create();
//        Gallery::factory(4)->create();
//        City::factory(4)->create();
//        Region::factory(4)->create();
//        District::factory(4)->create();
        Address::factory(4)->create();

//        $this->call(PermissionsTableSeeder::class);
//        $this->call(UpdatePermissionsTableSeeder::class);
//        $this->call(SettingTableSeeder::class);
    }
}
