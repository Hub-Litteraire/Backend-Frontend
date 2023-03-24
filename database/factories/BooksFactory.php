<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Books>
 */
class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_title' => 'To Kill a Mockingbird',
            'book_description' => 'To Kill a Mockingbird, Novel by Harper Lee, published in 1960. It is set in the fictional town of Maycomb, Ala., during the Great Depression',
            'book_author' => 'Harper Lee',
            'book_cover' => 'http://res.cloudinary.com/dhti1bezp/image/upload/v1678974266/books/uwne5xgzudqichuwsla7.jpg',
            'book_pdf' => 'http://res.cloudinary.com/dhti1bezp/image/upload/v1679042441/books/ahmauedmkgv3ydxbnenh.pdf',
            'category_id' => 1,
            'archived' => 0,
        ];
    }
}
