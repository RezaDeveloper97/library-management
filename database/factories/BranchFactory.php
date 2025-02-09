<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;

class BranchFactory extends Factory
{
    public function definition()
    {
        return [
            'city_id' => City::factory(),
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'postal_code' => $this->faker->postcode,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ];
    }
}
