<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PromoCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "code" => ucwords($this->faker->lexify("??????????")),
            "discount" => $this->faker->numberBetween($min = 0, $max = 8),
            "user_id" => rand(1,2)
        ];
    }
}
