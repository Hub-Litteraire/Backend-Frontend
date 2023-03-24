<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use PHPUnit\Metadata\Uses;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
        ]);
            $role = Role::create(['name' => 'Admin']);
            $user->assignRole($role);
        // \App\Models\User::factory(10)->create();
        \App\Models\Category::factory(1)->create();
        \App\Models\Books::factory(1)->create();
        \App\Models\Group::factory(1)->create();
        \App\Models\members::factory(1)->create();
        // \App\Models\likes::factory(5)->create();
        // \App\Models\Comments::factory(11)->create();
        // \App\Models\books_comments::factory(11)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
    }
}
