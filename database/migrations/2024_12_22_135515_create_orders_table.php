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
            $table->id();
            $table->integer('user_id');
            $table->string('code');
            $table->string('method');
            $table->integer('total_payment')->nullable();
            $table->string('payment_status')->nullable();
            $table->text('note')->nullable();
            $table->string('status');
            $table->string('pay_cred')->nullable();
            $table->text('pay_attachment')->nullable();
            $table->string('delivery');
            $table->dateTime('created_at');
            $table->dateTime('payed_at')->nullable();
            $table->dateTime('processed_at')->nullable();
            $table->dateTime('shiped_at')->nullable();
            $table->dateTime('finished_at')->nullable();
            $table->integer('is_reviewed')->nullable();
            $table->dateTime('updated_at');
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
