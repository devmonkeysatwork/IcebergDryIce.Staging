<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
  public function run()
  {
    // Reset cached roles and permissions
    app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

    // create permissions
    Permission::create(['name' => 'manage users']);
    Permission::create(['name' => 'manage roles']);
    Permission::create(['name' => 'manage permissions']);
    // Add other permissions as needed

    // create roles and assign existing permissions
    $role = Role::create(['name' => 'admin']);
    $role->givePermissionTo(Permission::all());

    // create a regular user role
    Role::create(['name' => 'user']);
  }
}
