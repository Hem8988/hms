<?php

namespace Database\Factories;

use App\Models\about;
use Illuminate\Database\Eloquent\Factories\Factory;

class aboutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = about::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => '1',
            'body' => 'Pardesi Resort is located in the middle of the commercial center of Ho Chi Minh City, beside the Saigon River, designed in the ancient, luxurious and cozy French architecture. With poetic and charming scenery and location near big commercial centers, famous restaurants, Bar - Dance hall - Karaoke... Riverside Hotel is a convenient place for visitors, business, dining,... shopping and entertainment. Riverside Hotel is also an ideal place for commercial guests, tourists to relax and rest by the fresh and cool air on the riverside.',
            'image' => 'img_1.jpg',
            'video' => 'https://www.youtube.com/watch?v=tsreyumQ_Xs&list=RDYEOiPkhUGNI&index= ',
        ];
    }
}
