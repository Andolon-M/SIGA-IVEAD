<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //\App\Models\User::factory(10)->create();

        \App\Models\User::updateOrCreate(
            ['name' => 'admin'],
            [
                'name' => 'admin',
                'email' => 'admin@ivead.org',
                'password' => bcrypt('admin123')
            ]
        );

        $this->call(RolesSeeder::class);
    }
}
