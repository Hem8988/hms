<?php

namespace Database\Factories;

use App\Models\Description;
use Illuminate\Database\Eloquent\Factories\Factory;

class DescriptionFActory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Description::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => '1',
            'room' => 'The hotel has 51 spacious and luxurious rooms of 3-star international standard. Single, Family and Presidential Rooms are furnished with precious wooden furniture with river-facing windows, allowing you to fully enjoy the fresh air and watch the city shimmering at night. With a staff of polite, considerate and experienced reception staff, Paradise Resort is definitely the place to best meet all amenities and services for you.',
            'photo' => 'Take a tour of the hotel with super shimmering photos taken by the guests who had a great time here.',
            'menu' => 'Proud to be a chain of restaurants specializing in steak and European dishes designed for Vietnamese people, with Vietnamese prices. We care about the customers experience, designing special Family and Lover combos for families and couples; to guide the staff to enthusiastically advise on the types of beef and how to enjoy it.', 
            'event' => 'Let`s welcome a series of promotional events on the occasion of summer 2019. Enjoy a wonderful vacation with your family!',
        ];
    }
}
