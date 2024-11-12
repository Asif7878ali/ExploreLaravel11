<?php

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
        Schema::create('comments', function (Blueprint $table) {
            $table->id('comment_id');
            // contrained is refer which table in my case users Table  user_id column is primary key of users table
            $table->foreignId('user')->constrained('users', 'user_id');
            $table->text('comment');
            // contrained is refer which table in my case posts Table  post_id column is primary key of posts table
            $table->foreignId('post')->constrained('posts','post_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
