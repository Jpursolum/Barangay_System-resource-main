<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();brgySecretary
        if (! Role::where('name', 'brgyUser')->exists()) {
            Role::create(['name' => 'brgyUser', 'guard_name' => 'web']);
        }
        if (! Role::where('name', 'brgySecretary')->exists()) {
            Role::create(['name' => 'brgySecretary', 'guard_name' => 'web']);
        }

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ]);

        $user->assignRole('super_admin');

    }
}
