<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

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

        Banner::factory(4)->create();

        $this->call(PermissionsTableSeeder::class);
        $this->call(UpdatePermissionsTableSeeder::class);
        $this->call(SettingTableSeeder::class);
    }
}
