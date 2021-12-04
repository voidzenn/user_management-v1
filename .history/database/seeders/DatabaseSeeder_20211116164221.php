<?php

namespace Database\Seeders;

use App\Models\Car;
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
    }
}
