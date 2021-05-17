<?php

namespace Database\Seeders;

use App\Models\city;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cityseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [
                'city_id' => 1,
                'state_id' => 1,
                'city_name' => 'Visakhapatnam'

            ],
            [
                'city_id' => 2,
                'state_id' => 1,
                'city_name' => 'Vijayawada'

            ],
            [
                'city_id' => 3,
                'state_id' => 1,
                'city_name' => 'Guntakal'

            ],
            [
                'city_id' => 4,
                'state_id' => 1,
                'city_name' => 'Tenali'

            ],
            [
                'city_id' => 5,
                'state_id' => 2,
                'city_name' => 'Anjaw'

            ],
            [
                'city_id' => 6,
                'state_id' => 2,
                'city_name' => 'Changlang'

            ],
            [
                'city_id' => 7,
                'state_id' => 2,
                'city_name' => 'Dibang Valley.'

            ],
            [
                'city_id' => 8,
                'state_id' => 2,
                'city_name' => 'East Kameng.'

            ],
            [
                'city_id' => 9,
                'state_id' => 2,
                'city_name' => 'Itanagar'

            ],
            [
                'city_id' => 10,
                'state_id' => 2,
                'city_name' => 'Dungaditand'

            ],
            [
                'city_id' => 11,
                'state_id' => 3,
                'city_name' => 'Gomia'

            ],
            [
                'city_id' => 12,
                'state_id' => 3,
                'city_name' => 'Barpeta'

            ],

            [
                'city_id' => 13,
                'state_id' => 3,
                'city_name' => 'Jena'

            ],

            [
                'city_id' => 14,
                'state_id' => 4,
                'city_name' => 'Kurpania'

            ],
            [
                'city_id' => 15,
                'state_id' => 4,
                'city_name' => 'Lalpania'

            ],
            [
                'city_id' => 16,
                'state_id' => 4,
                'city_name' => 'Phusro'

            ],
            [
                'city_id' => 17,
                'state_id' => 4,
                'city_name' => 'Sijhua'

            ],
            [
                'city_id' => 18,
                'state_id' => 5,
                'city_name' => 'Tenu'

            ],
            [
                'city_id' => 19,
                'state_id' => 9,
                'city_name' => 'Kinnaur'

            ],
            [
                'city_id' => 20,
                'state_id' => 9,
                'city_name' => 'shimla'

            ],
            [
                'city_id' => 21,
                'state_id' => 9,
                'city_name' => 'solan'

            ],
            [
                'city_id' => 22,
                'state_id' => 9,
                'city_name' => 'kullu'

            ],
            [
                'city_id' => 23,
                'state_id' => 9,
                'city_name' => 'kangra'

            ],
            [
                'city_id' => 24,
                'state_id' => 9,
                'city_name' => 'una'

            ],
            [
                'city_id' => 25,
                'state_id' => 6,
                'city_name' => 'North Goa'

            ],
            [
                'city_id' => 26,
                'state_id' => 6,
                'city_name' => 'South Goa'

            ],
            [
                'city_id' => 27,
                'state_id' => 7,
                'city_name' => 'Ahmedabad'

            ],
            [
                'city_id' => 28,
                'state_id' => 7,
                'city_name' => 'Anand'

            ],
            [
                'city_id' => 29,
                'state_id' => 7,
                'city_name' => 'Aravalli'

            ],
            [
                'city_id' => 30,
                'state_id' => 7,
                'city_name' => 'Amreli'

            ],
            [
                'city_id' => 31,
                'state_id' => 7,
                'city_name' => 'Banaskantha '

            ],
            [
                'city_id' => 32,
                'state_id' => 7,
                'city_name' => 'Banaskantha'

            ],

        ];

        city::insert($cities);
    }
}
