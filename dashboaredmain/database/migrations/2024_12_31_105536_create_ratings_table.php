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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
    
            // Foreign key to the orders table
            $table->foreignId('order_id')
                ->constrained('orders')  // Ensure it points to the orders table
                ->onDelete('cascade');   // Deletes ratings if the order is deleted
        
            // Foreign key to the customers (buyers)
            $table->foreignId('customer_id')
                ->constrained('customers')  // Ensure it points to the customers table (buyers)
                ->onDelete('cascade');      // Deletes ratings if the customer is deleted
        
            // Foreign key to the rated customer (sellers)
            $table->foreignId('rated_customer_id')
                ->constrained('customers')  // Ensure it points to the same customers table (sellers)
                ->onDelete('cascade');      // Deletes ratings if the seller is deleted
        
            // Rating field (from 1 to 5)
            $table->tinyInteger('rating')   // Use tinyInteger to limit the rating to 1-5
                ->unsigned() 
                ->default(0);  // Default to 1 if not set
        
            // Comment field (nullable)
            $table->text('comment')->nullable();
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
