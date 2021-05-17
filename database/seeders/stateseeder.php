<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\state;

class stateseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [

            [
                'state_id' => 1,
                'country_id' => 1,
                'state_name' => 'Andhra Pradesh'

            ],
            [
                'state_id' => 2,
                'country_id' => 1,
                'state_name' => 'Arunachal Pradesh '
            ],
            [
                'state_id' => 3,
                'country_id' => 1,
                'state_name' => 'Assam'

            ],
            [
                'state_id' => 4,
                'country_id' => 1,
                'state_name' => 'Bihar'

            ],
            [
                'state_id' => 5,
                'country_id' => 1,
                'state_name' => 'Chhattisgarh'

            ],
            [
                'state_id' => 6,
                'country_id' => 1,
                'state_name' => 'Goa'

            ],
            [
                'state_id' => 7,
                'country_id' => 1,
                'state_name' => 'Gujarat'

            ],
            [
                'state_id' => 8,
                'country_id' => 1,
                'state_name' => 'Haryana'

            ],
            [
                'state_id' => 9,
                'country_id' => 1,
                'state_name' => 'Himachal Pradesh'

            ],
            [
                'state_id' => 10,
                'country_id' => 1,
                'state_name' => 'Jharkhand'

            ],
            [
                'state_id' => 11,
                'country_id' => 1,
                'state_name' => 'Karnataka'

            ],
            [
                'state_id' => 12,
                'country_id' => 1,
                'state_name' => 'Kerala '

            ],
            [
                'state_id' => 13,
                'country_id' => 1,
                'state_name' => 'Madhya Pradesh'

            ],
            [
                'state_id' => 14,
                'country_id' => 1,
                'state_name' => 'Maharashtra'

            ],
            [
                'state_id' => 15,
                'country_id' => 1,
                'state_name' => 'Manipur'

            ],
            [
                'state_id' => 16,
                'country_id' => 1,
                'state_name' => 'Meghalaya'

            ],
            [
                'state_id' => 17,
                'country_id' => 1,
                'state_name' => 'Mizoram'

            ],
            [
                'state_id' => 18,
                'country_id' => 1,
                'state_name' => 'Nagaland'

            ],
            [
                'state_id' => 19,
                'country_id' => 1,
                'state_name' => 'Odisha'

            ],
            [
                'state_id' => 20,
                'country_id' => 1,
                'state_name' => 'Punjab'

            ],
            [
                'state_id' => 21,
                'country_id' => 1,
                'state_name' => 'Rajasthan'

            ],
            [
                'state_id' => 22,
                'country_id' => 1,
                'state_name' => 'Sikkim'

            ],
            [
                'state_id' => 23,
                'country_id' => 1,
                'state_name' => 'Tamil Nadu'

            ],
            [
                'state_id' => 24,
                'country_id' => 1,
                'state_name' => 'Telangana '

            ],
            [
                'state_id' => 25,
                'country_id' => 1,
                'state_name' => 'Tripura '

            ],
            [
                'state_id' => 26,
                'country_id' => 1,
                'state_name' => 'Uttar Pradesh'

            ],
            [
                'state_id' => 27,
                'country_id' => 1,
                'state_name' => 'Uttarakhand'

            ],
            [
                'state_id' => 28,
                'country_id' => 1,
                'state_name' => 'West Bengal '

            ],
            [
                'state_id' => 29,
                'country_id' => 1,
                'state_name' => ' Andaman and Nicobar Islands '

            ],
            [
                'state_id' => 30,
                'country_id' => 1,
                'state_name' => 'Chandigarh'

            ],
            [
                'state_id' => 31,
                'country_id' => 1,
                'state_name' => 'Dadra and Nagar Haveli and Daman and Diu (DNHDD)'

            ],
            [
                'state_id' => 32,
                'country_id' => 1,
                'state_name' => 'Delhi'

            ],
            [
                'state_id' => 33,
                'country_id' => 1,
                'state_name' => 'Jammu and Kashmir '

            ],
            [
                'state_id' => 34,
                'country_id' => 1,
                'state_name' => 'Ladakh  '

            ],
            [
                'state_id' => 35,
                'country_id' => 1,
                'state_name' => 'Lakshadweep'

            ],
            [
                'state_id' => 36,
                'country_id' => 1,
                'state_name' => 'Puducherry'

            ],


        ];

        state::insert($states);
    }
}
