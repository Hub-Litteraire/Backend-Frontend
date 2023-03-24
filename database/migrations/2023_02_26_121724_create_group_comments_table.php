<?php

use App\Models\Books;
use App\Models\Comments;
use App\Models\Group;
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
        Schema::create('group_comments', function (Blueprint $table) {
            $table->foreignIdFor(Group::class)
            ->constrained('groups')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignIdFor(Comments::class)
            ->constrained('comments')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->primary(['group_id' , 'comments_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_comments');
    }
};
