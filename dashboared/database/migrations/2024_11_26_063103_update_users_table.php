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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_as');

            $table->enum('role', ['admin', 'customer', 'intermediary'])->default('customer')->after('email');

            $table->string('phone')->nullable()->after('role');

            $table->text('address')->nullable()->after('phone');
        });
       

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('address');

            $table->dropColumn('phone');

            $table->dropColumn('role');

            $table->tinyInteger('role_as')->default(0);
        });
    }
};
