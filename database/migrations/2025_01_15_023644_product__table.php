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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_code')->unique();
            $table->string('product_name');
            $table->enum('product_type', ['125 CC', '150 CC']);
            $table->string('product_description');
            $table->decimal('product_price', 10, 2);
            $table->string('foto')->nullable();
            $table->string('merk');
            $table->string('product_stock');
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
