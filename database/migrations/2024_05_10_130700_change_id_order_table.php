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
        Schema::table('orders', function (Blueprint $table) {
            $table->bigIncrements('id')->change(); // Revert data type to integer
        });

        Schema::table('order_details', function (Blueprint $table) {
            $table->bigInteger('order_id')->change(); // Revert data type to integer
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('id')->change(); // Revert data type to integer
        });

        Schema::table('order_details', function (Blueprint $table) {
            $table->integer('order_id')->change(); // Revert data type to integer
        });
    }
};
