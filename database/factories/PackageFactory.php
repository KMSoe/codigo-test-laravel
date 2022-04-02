<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => "Unlimated Classes",
            "description" => $this->faker->sentence(10),
            "type" => $this->faker->word(),
            "total_credit" => $this->faker->numberBetween($min = 0, $max = 50),
            "validity_month" => $this->faker->numberBetween($min = 1, $max = 24),
            "price" => $this->faker->doubleval(),
            "gst_percent" => 7.00,
            "newbie_first_attend" => $this->faker->boolean(),
            "newbie_addition_credit" => $this->faker->numberBetween($min = 0, $max = 9),
            "newbie_note" => $this->faker->text(),
            "alias" => $this->faker->word(),
            "estimate_price" => $this->faker->doubleval(),
        ];
    }
}
