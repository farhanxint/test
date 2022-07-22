<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\VarDumper\VarDumper;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $config = config('role-permission-module');

        $roles = $config['roles-set'];
        $permissions = $config['permissions-set'];

        foreach ($permissions as $permission => $value)
        {
            VarDumper::dump("Adding Permission $value :: $permission");
            Permission::findOrCreate($permission, 'web');
        }

        foreach ($roles as $role => $value)
        {
            VarDumper::dump("Adding Role $value :: $role");
            $role = Role::findOrCreate($role, 'web');
            $modules = $config['module-permissions-set'][$role->name] ?? null;
            if ($modules)
            {
                foreach ($modules as $module)
                {
                    foreach ($module as $permission)
                    {
                        VarDumper::dump("Assign Permission $permission to $role->name");
                        $role->givePermissionTo($permission);
                    }
                }
            }
        }
    }
}
