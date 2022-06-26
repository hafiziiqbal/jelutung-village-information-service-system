<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $rolesArray = [
            [
                'name'  => 'administrator',
                'guard_name' => 'api'
            ],
            [
                'name'  => 'operator',
                'guard_name' => 'api'
            ],
            [
                'name'  => 'resident',
                'guard_name' => 'api'
            ],
        ];
        foreach ($rolesArray as $role) {
            Role::updateOrCreate($role);
        }
    }
}
