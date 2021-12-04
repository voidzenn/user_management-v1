<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Car;
use App\Models\Role;
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

        Car::create([
            'name' => 'Toyota'
        ]);

        Car::create([
            'name' => 'Ford'
        ]);

        Car::create([
            'name' => 'Tesla'
        ]);

        Car::create([
            'name' => 'Volvo'
        ]);

        Car::create([
            'name' => 'Nissan'
        ]);

        Role::create([
           'name' => 'user'
        ]);

        User::create([
           'name' => 'mike',
           'email' => '1@1.com',
           'password' => '$2a$12$xGGXulNxLcQJ3URg587riOw9Jtw.Omic3./E0hbuF/k93MQXc/JwG',
           'status' => '1',
           'role_id' => '1',
           'created_at' => now()
        ]);
    }
}
