<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Create the 'brgyUser' role if it doesn't exist
        if (! Role::where('name', 'brgyUser')->exists()) {
            Role::create(['name' => 'brgyUser', 'guard_name' => 'web']);
        }
    }
}
