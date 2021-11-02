<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id'=> User::factory(),
            'identyfier'=>strtolower(Str::random(10)),
            'body'=> $this->faker->sentence()
        ];
    }
}
