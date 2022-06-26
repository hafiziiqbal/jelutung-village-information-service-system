<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{

    public function run()
    {
        $permisionsArray = [
            [
                'name'  => 'letter service access',
                'guard_name' => 'api'
            ],
            [
                'name'  => 'manage letter and letter service',
                'guard_name' => 'api'
            ],
            [
                'name'  => 'manage website data and features',
                'guard_name' => 'api'
            ],
        ];
        foreach ($permisionsArray as  $permission) {
            Permission::updateOrCreate($permission);
        }
    }
}
