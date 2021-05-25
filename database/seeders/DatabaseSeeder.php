<?php

namespace Database\Seeders;

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
        \App\Models\Admin::factory(1)->create();
        $this->call([
            stateseeder::class,
            aboutSeeder::class,
            cityseeder::class,
            countryseeder::class,
            descriptionSeed::class,
            informtionSeeder::class,
        ]);
    }
}
