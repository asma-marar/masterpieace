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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('intermediary_id'); // Reference to the users table
            $table->unsignedBigInteger('user_id'); // The user leaving the review
            $table->text('comment'); // Review content
            $table->tinyInteger('rating')->unsigned(); // Rating out of 5
            $table->softDeletes(); // Adds deleted_at column
            $table->timestamps();


        // Foreign key constraints
        $table->foreign('intermediary_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
