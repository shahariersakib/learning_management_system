<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTable extends Migration
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
            $table->string('course_name')->nullable();
            $table->string('course_code')->nullable();
            $table->text('course_intro_link')->nullable();
            $table->text('course_link')->nullable();
            $table->text('course_desc')->nullable();
            $table->string('course_duration')->nullable();
            $table->text('learning_objectives')->nullable();
            $table->string('course_price')->nullable();
            $table->string('course_slug')->nullable();
            $table->integer('admin_id')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('course');
    }
}
