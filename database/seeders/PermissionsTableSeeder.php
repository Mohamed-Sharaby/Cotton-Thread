<?php
namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::updateOrCreate(['email'=>'admin@admin.com'],[
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'phone' => '123456',
            'password' => '123456',
            'is_ban' => 0,
        ]);
        $permissions = [
            'Admins',
            'Roles',
            'Users',
            'Cities',
            'Regions',
            'Districts',
            'Addresses',
            'Products',
            'Categories',
            'SubCategories',
            'Banners',
            'Carts',
            'Coupons',
            'Galleries',
            'Settings',
            'GuestMessages',
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission],['name' => $permission, 'guard_name' => 'admin']);
        }

        $role = Role::updateOrCreate(['name'=> 'Super Admin'],['name' => 'Super Admin', 'guard_name' => 'admin']);
        $role->syncPermissions($permissions);
        $user->assignRole('Super Admin');
    }
}
