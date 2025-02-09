<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Province;

class CityFactory extends Factory
{
    public function definition()
    {
        return [
            'province_id' => Province::factory(),
            'name' => $this->faker->unique()->city,
        ];
    }
}
