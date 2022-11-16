<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('category_id');
            $table->string('slug');
            $table->string('date');
            $table->string('country');
            $table->string('city');
            $table->enum('event_type', ['Paid', 'Free']);
            $table->double('price')->nullable();
            $table->string('starting_time');
            $table->string('ending_time');
            $table->longText('address');
            $table->longText('description')->nullable();
            $table->integer('total_seat')->default(0);
            $table->integer('booked_seat')->default(0);
            $table->integer('total_views')->default(0);
            $table->string('thumbnail')->default('backend/image/itemdefault.jpeg');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
