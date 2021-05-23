<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Description;
class descriptionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Description::factory(1)->create();  
    }
}
