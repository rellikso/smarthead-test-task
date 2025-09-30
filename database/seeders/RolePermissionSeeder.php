<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Создаём роли
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $customerRole = Role::firstOrCreate(['name' => 'customer']);

        // Создаём базовые права
        $permissions = [
            'manage users',
            'manage customers',
            'view tickets',
            'create ticket',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Назначаем права ролям
        $adminRole->syncPermissions(Permission::all()); // админ может всё
        $customerRole->syncPermissions([
            'view tickets',
            'create ticket',
        ]);
    }
}
