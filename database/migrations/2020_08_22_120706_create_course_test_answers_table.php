<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTestAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_test_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id',false);
            $table->unsignedBigInteger('course_test_question_id',false);
            $table->string('answer');
            $table->text('user_answer');
            $table->string('file')->nullable();
            $table->tinyinteger('status')->default(1);
            $table->foreign('course_test_question_id')->references('id')->on('course_test_questions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('course_test_answers');
    }
}
