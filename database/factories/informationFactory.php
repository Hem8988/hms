<?php

namespace Database\Factories;

use App\Models\information;
use Illuminate\Database\Eloquent\Factories\Factory;

class informationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = information::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => '1',
            'name' => 'Pardesi Resort',
            'slogan' => 'A Best Place To Stay',
            'email' => 'hem7264@gmail.com',
            'phone_number' => '8988225521',
            'address' => 'Vpo Barang Tehsil Kalpa Distt Kinnaur Himachal Perdesh Pin--172107',

        ];
    }
}
