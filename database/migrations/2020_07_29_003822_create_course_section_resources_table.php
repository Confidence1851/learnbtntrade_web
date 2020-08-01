<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseSectionResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_section_resources', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_section_id',false);
            $table->string('filename');
            $table->string('size');
            $table->string('type');
            $table->string('file');
            $table->tinyinteger('status')->default(0);
            $table->foreign('course_section_id')->references('id')->on('course_sections')->onDelete('cascade');
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
        Schema::dropIfExists('course_section_resources');
    }
}
