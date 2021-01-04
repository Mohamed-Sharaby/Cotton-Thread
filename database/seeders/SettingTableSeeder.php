<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'name' => 'phone',
                'ar_value' => '+9665123250',
                'en_value' => '+9665123560',
                'type' => 'number',
                'page' => 'إعدادات عامة',
                'ar_title' => 'الهاتف',
                'en_title' => 'phone',
                'slug' => 'الهاتف'
            ],[
                'name' => 'mobile',
                'ar_value' => '+9665123250',
                'en_value' => '+9665123560',
                'type' => 'number',
                'page' => 'إعدادات عامة',
                'ar_title' => 'الجوال',
                'en_title' => 'mobile',
                'slug' => 'الجوال'
            ],
            [
                'name' => 'email',
                'ar_value' => 'hi@gmail.com',
                'en_value' => 'hi@gmail.com',
                'type' => 'email',
                'page' => 'إعدادات عامة',
                'ar_title' => 'البريد الالكترونى',
                'en_title' => 'email',
                'slug' => 'email'
            ],
            [
                'name' => 'facebook',
                'ar_value' => 'https://www.facebook.com',
                'en_value' => 'https://www.facebook.com',
                'type' => 'url',
                'page' => 'إعدادات عامة',
                'ar_title' => 'رابط الفيس بوك',
                'en_title' => 'facebook',
                'slug' => 'social'
            ],
            [
                'name' => 'twitter',
                'ar_value' => 'https://www.twitter.com',
                'en_value' => 'https://www.twitter.com',
                'type' => 'url',
                'page' => 'إعدادات عامة',
                'ar_title' => 'رابط تويتر',
                'en_title' => 'twitter',
                'slug' => 'social'
            ],
            [
                'name' => 'instagram',
                'ar_value' => 'https://www.instagram.com',
                'en_value' => 'https://www.instagram.com',
                'type' => 'url',
                'page' => 'إعدادات عامة',
                'ar_title' => 'رابط  الانستجرام',
                'en_title' => 'instagram',
                'slug' => 'social'
            ], [
                'name' => 'google',
                'ar_value' => 'https://www.google.com',
                'en_value' => 'https://www.google.com',
                'type' => 'url',
                'page' => 'إعدادات عامة',
                'ar_title' => 'رابط  جوجل',
                'en_title' => 'google',
                'slug' => 'social'
            ],
            [
                'name' => 'about',
                'ar_value' => 'about-us in arabic',
                'en_value' => 'about-us in english',
                'page' => 'إعدادات عامة',
                'type' => 'long_text',
                'ar_title' => 'من نحن',
                'en_title' => 'who-we-are',
                'slug' => 'aboutus'
            ],


        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
