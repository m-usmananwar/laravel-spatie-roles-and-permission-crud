<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'create-post',
            'update-post',
            'delete-post',
            'view-post',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        $superAdmin = Role::create(['name' => 'Super Admin']);
        $superAdminUser = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@superadmin.com',
            'password' => Hash::make('password'),
        ]);
        $superAdminUser->assignRole($superAdmin);
        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->syncPermissions([
            'create-post',
            'delete-post',
            'view-post',
        ]);
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole($adminRole);
        $userRole = Role::create(['name' => 'user']);
        $user = User::create([
            'name' => 'TestUser',
            'email' => 'test@test.com',
            'password' => Hash::make('password'),
        ]);
        $userRole->syncPermissions(['view-post', 'create-post']);
        $user->assignRole($userRole);
        $editorRole = Role::create(['name' => 'editor']);
        $editor = User::create([
            'name' => 'Editor',
            'email' => 'editor@editor.com',
            'password' => Hash::make('password'),
        ]);
        $editorRole->syncPermissions(['delete-post', 'update-post']);
        $editor->assignRole($editorRole);
    }
}
