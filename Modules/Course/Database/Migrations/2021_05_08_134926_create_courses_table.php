<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('instructor_id');
            $table->string('title');
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->string('thumbnail')->default('backend/image/itemdefault.jpeg');
            $table->double('price')->nullable();
            $table->double('discount_price')->nullable();
            $table->string('level');
            $table->integer('duration');
            $table->enum('course_type', ['Paid', 'Free']);
            $table->enum('video_type', ['youtube', 'vimeo']);
            $table->text('video_url');
            $table->integer('total_views')->default(0);
            $table->integer('total_purchase')->default(0);
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
