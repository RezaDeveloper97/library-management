<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\BookEdition;
use App\Models\Branch;

class BookStockFactory extends Factory
{
    public function definition()
    {
        $totalCopies = $this->faker->numberBetween(5, 100);
        $reservedCopies = $this->faker->numberBetween(0, $totalCopies - 1);
        return [
            'book_id' => Book::inRandomOrder()->value('id') ?? Book::factory(),
            'edition_id' => BookEdition::inRandomOrder()->value('id') ?? BookEdition::factory(),
            'branch_id' => Branch::inRandomOrder()->value('id') ?? Branch::factory(),
            'total_copies' => $totalCopies,
            'reserved_copies' => $reservedCopies,
        ];
    }
}
