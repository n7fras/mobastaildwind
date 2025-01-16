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
        //
        Schema::create('customer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cust_id')->unique();
            $table->string('Username');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('password');
            $table->boolean('status')->default(1);

            $table->timestamps();               
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
