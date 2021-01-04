<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UpdatePermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            'Admins'=> 'التعامل مع المديرين',
            'Roles' => 'التعامل مع الصلاحيات والمناصب',
            'Products'=> 'التعامل مع المنتجات',
            'Settings'=> 'التعامل مع الاعدادات ',
            'Categories'=> 'التعامل مع الاقسام الرئيسية ',
            'SubCategories'=> 'التعامل مع الاقسام الفرعية ',
            'Banners'=> 'التعامل مع البانرات ',
            'Galleries'=> 'التعامل مع مكتبة الصور والفيديو ',
        ];

        foreach ($permissions as $key => $permission) {
            Permission::where('name', $key)->update(['ar_name' => $permission]);
        }
    }
}
