<?php
namespace Database\Factories;

use App\Enums\EReturnPolicy;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;

class BookFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'author_id' => Author::factory(),
            'is_vip_only' => $this->faker->boolean,
            'return_policy' => $this->faker->randomElement(EReturnPolicy::cases()),
        ];
    }
}
