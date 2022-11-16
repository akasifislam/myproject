<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('method')->nullable();
            $table->string('card_no')->nullable();
            $table->string('expiry_date')->nullable();
            $table->string('card_type')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('currency')->nullable();
            $table->enum('status', ['unpaid', 'paid', 'complete', 'cancelled'])->default('unpaid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
