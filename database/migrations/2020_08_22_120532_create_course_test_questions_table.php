<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTestQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_test_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_test_id',false);
            $table->unsignedBigInteger('course_id',false);
            $table->text('question');
            $table->string('type');
            $table->string('a')->nullable();
            $table->string('b')->nullable();
            $table->string('c')->nullable();
            $table->string('d')->nullable();
            // $table->string('e')->nullable();
            $table->string('answer')->nullable();
            $table->string('file')->nullable();
            $table->string('duration')->nullable();
            $table->tinyinteger('status')->default(0);
            $table->foreign('course_test_id')->references('id')->on('course_tests')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_test_questions');
    }
}
