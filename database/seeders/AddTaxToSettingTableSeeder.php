<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class AddTaxToSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name' => 'tax_percentage',
            'ar_value' => '14',
            'en_value' => '14',
            'page' => 'حسابات الموقع',
            'type' => 'number',
            'ar_title' => 'الضريبة',
            'en_title' => 'tax',
            'slug' => 'tax'
        ]);
    }
}
