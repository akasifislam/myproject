<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('slug')->unique();
            $table->string('email');
            $table->string('password')->nullable();
            $table->string('image')->default('backend/image/default.png');
            $table->string('phone')->nullable();
            $table->string('profession')->nullable();
            $table->text('about')->nullable();
            $table->text('address')->nullable();
            $table->enum('gender', ['Male', 'Female'])->default('Male');
            $table->text('instagram_link')->nullable();
            $table->text('fb_link')->nullable();
            $table->text('twitter_link')->nullable();
            $table->text('youtube_link')->nullable();
            $table->text('linkedin_link')->nullable();
            $table->integer('total_stars')->default(0);
            $table->integer('total_reviews')->default(0);
            $table->integer('total_enrolled')->default(0);
            $table->boolean('status')->default(true);
            $table->rememberToken();
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
        Schema::dropIfExists('instructors');
    }
}
