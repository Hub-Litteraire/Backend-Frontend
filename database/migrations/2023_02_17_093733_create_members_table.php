<?php

use App\Models\Group;
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
        Schema::create('members', function (Blueprint $table) {
            $table->foreignIdFor(Group::class)
            ->constrained('groups')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignIdFor(User::class)
            ->constrained('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->primary(['group_id' , 'user_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
