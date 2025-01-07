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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
            $table->text('description'); 
            $table->string('image'); 
            $table->decimal('price', 10, 2); 
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); 
            $table->integer('quantity'); 
            $table->string('color'); 
            $table->string('size'); 
            $table->softDeletes(); 
            $table->timestamps();

            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
