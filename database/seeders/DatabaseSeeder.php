<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = [
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'name' => 'admin',
                'password' => bcrypt('admin'),
                'is_admin' => '1',
            ],
            [
                'username' => 'lurah',
                'email' => 'lurah@gmail.com',
                'name' => 'lurah',
                'password' => bcrypt('lurah'),
                'is_admin' => '0',
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
