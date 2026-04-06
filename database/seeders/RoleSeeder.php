<?php

namespace Database\Seeders;

use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends BaseSeeder
{
    public function __construct()
    {
        $this->setPayload('roles');
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = $this->getPayload();

        foreach ($roles as $role) {
            $model = Role::create(Arr::except($role, 'permissions'));

            $permissions = Permission::all()->modelKeys();
            $model->givePermissionTo($permissions);
        }
    }
}
