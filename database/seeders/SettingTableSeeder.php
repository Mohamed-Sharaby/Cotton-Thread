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
                'name' => 'address',
                'ar_value' => 'KSA',
                'en_value' => 'KSA',
                'type' => 'text',
                'page' => 'إعدادات عامة',
                'ar_title' => 'العنوان',
                'en_title' => 'Address',
                'slug' => 'address'
            ],[
                'name' => 'phone',
                'ar_value' => '+9665123250',
                'en_value' => '+9665123560',
                'type' => 'number',
                'page' => 'إعدادات عامة',
                'ar_title' => 'الهاتف',
                'en_title' => 'phone',
                'slug' => 'phone'
            ],[
                'name' => 'mobile',
                'ar_value' => '+9665123250',
                'en_value' => '+9665123560',
                'type' => 'number',
                'page' => 'إعدادات عامة',
                'ar_title' => 'الجوال',
                'en_title' => 'mobile',
                'slug' => 'mobile'
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
                'page' => 'وسائل التواصل الاجتماعى',
                'ar_title' => 'رابط الفيس بوك',
                'en_title' => 'facebook',
                'slug' => 'facebook'
            ],
            [
                'name' => 'twitter',
                'ar_value' => 'https://www.twitter.com',
                'en_value' => 'https://www.twitter.com',
                'type' => 'url',
                'page' => 'وسائل التواصل الاجتماعى',
                'ar_title' => 'رابط تويتر',
                'en_title' => 'twitter',
                'slug' => 'twitter'
            ],
            [
                'name' => 'instagram',
                'ar_value' => 'https://www.instagram.com',
                'en_value' => 'https://www.instagram.com',
                'type' => 'url',
                'page' => 'وسائل التواصل الاجتماعى',
                'ar_title' => 'رابط  الانستجرام',
                'en_title' => 'instagram',
                'slug' => 'instagram'
            ], [
                'name' => 'google',
                'ar_value' => 'https://www.google.com',
                'en_value' => 'https://www.google.com',
                'type' => 'url',
                'page' => 'وسائل التواصل الاجتماعى',
                'ar_title' => 'رابط  جوجل',
                'en_title' => 'google',
                'slug' => 'google'
            ],
            [
                'name' => 'about',
                'ar_value' => 'about-us in arabic',
                'en_value' => 'about-us in english',
                'page' => 'الصفحات الثابتة',
                'type' => 'long_text',
                'ar_title' => 'من نحن',
                'en_title' => 'Who-We-Are',
                'slug' => 'about_us'
            ],
            [
                'name' => 'return_policy',
                'ar_value' => 'return_policy in arabic',
                'en_value' => 'return_policy in english',
                'page' => 'الصفحات الثابتة',
                'type' => 'long_text',
                'ar_title' => 'سياسة الاسترجاع',
                'en_title' => 'Return Policy',
                'slug' => 'return_policy'
            ],
            [
                'name' => 'privacy_policy',
                'ar_value' => 'privacy_policy in arabic',
                'en_value' => 'privacy_policy in english',
                'page' => 'الصفحات الثابتة',
                'type' => 'long_text',
                'ar_title' => 'سياسة الخصوصية',
                'en_title' => 'Privacy Policy',
                'slug' => 'privacy_policy'
            ],
            [
                'name' => 'terms',
                'ar_value' => 'terms in arabic',
                'en_value' => 'terms in english',
                'page' => 'الصفحات الثابتة',
                'type' => 'long_text',
                'ar_title' => 'الشروط والاحكام',
                'en_title' => 'Terms and Conditions',
                'slug' => 'terms'
            ],


        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
