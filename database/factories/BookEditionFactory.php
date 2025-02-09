<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\Publisher;

class BookEditionFactory extends Factory
{
    public function definition()
    {
        return [
            'book_id' => Book::factory(),
            'publisher_id' => Publisher::factory(),
            'edition_year' => $this->faker->dateTimeBetween('-200 years', 'now'),
        ];
    }
}
