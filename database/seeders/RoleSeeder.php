<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Secretaria']);
        $role3 = Role::create(['name' => 'Vendedor']);

        // create permissions
        Permission::create(['name' => 'edit clients']);
    }
}