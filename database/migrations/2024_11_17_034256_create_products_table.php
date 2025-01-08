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
            $table->string('name', '255');
            $table->string('brand', '255');
            $table->text('description')->nullable();
            $table->integer('price');
            $table->integer('stock');
            $table->integer('rating')->nullable();
            $table->string('unit', '25');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**s
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
