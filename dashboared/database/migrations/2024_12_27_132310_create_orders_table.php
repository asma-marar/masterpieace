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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('customer_id')->index(); // Foreign key for customers
            $table->decimal('order_total', 10, 2); // Order total amount
            $table->enum('order_status', ['pending', 'processing', 'delivered', 'cancelled'])->default('pending'); // Order status
            $table->string('order_address', 255); // Order address
            $table->timestamps(); // created_at and updated_at columns
            $table->softDeletes(); // deleted_at column

            // Add foreign key constraint
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
