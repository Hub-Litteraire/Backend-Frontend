<?php

use App\Models\Books;
use App\Models\ratings;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books_ratings', function (Blueprint $table) {
            $table->foreignIdFor(Books::class)
            ->constrained('Books')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignIdFor(ratings::class)
            ->constrained('ratings')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->primary(['books_id' , 'ratings_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books_ratings');
    }
};
