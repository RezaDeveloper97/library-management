<?php

namespace Database\Seeders;

use App\Models\BookEdition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookEditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookEdition::factory(50)->create();
    }
}
