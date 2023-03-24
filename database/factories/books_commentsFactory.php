<?php

namespace Database\Factories;

use App\Models\Books;
use App\Models\Comments;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class books_commentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'books_id' => Books::factory() ,
            'comments_id' => Comments::factory()
        ];
    }
}
