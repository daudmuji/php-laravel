<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'costumers_create']);
        Permission::create(['name' => 'costumers_edit']);

        Role::create(['name' => 'cs']);
        Role::create(['name' => 'approval']);

        $roleCS = Role::findByName('cs');
        $roleCS->givePermissionTo('costumers_create');

        $approval = Role::findByName('approval');
        $approval->givePermissionTo('costumers_edit');
    }


}
