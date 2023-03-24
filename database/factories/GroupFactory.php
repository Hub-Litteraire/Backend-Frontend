<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Books;
use App\Models\User;
use App\Models\Usesr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'group_name' => 'group 1',
            'user_id' => 1,
            'book_id' => 1,
        ];
    }
}
