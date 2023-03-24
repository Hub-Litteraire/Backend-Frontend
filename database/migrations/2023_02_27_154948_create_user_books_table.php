<?php

use App\Models\Books;
use App\Models\User;
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
        Schema::create('user_books', function (Blueprint $table) {
            $table->foreignIdFor(User::class)
            ->constrained('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignIdFor(Books::class)
            ->constrained('books')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->primary(['books_id' , 'user_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_books');
    }
};
