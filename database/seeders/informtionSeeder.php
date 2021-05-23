<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class informtionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\information::factory(1)->create();
    }
}
