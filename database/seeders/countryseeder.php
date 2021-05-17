<?php

namespace Database\Seeders;

use App\Models\country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class countryseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            [
                'country_id' => 1,
                'country_name' => 'India',
                'phoneCode' => 91
            ],
            [
                'country_id' => 2,
                'country_name' => 'Albania',
                'phoneCode' => 355
            ],

        ];
        country::insert($countries);
    }
}
