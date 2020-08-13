<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->unsignedBigInteger('user_id',false);
            $table->unsignedBigInteger('course_category_id',false);
            $table->string('image')->nullable();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('code')->unique();
            $table->string('orders_count')->default(0);
            $table->decimal('price');
            $table->decimal('discount')->default(0);
            $table->text('description');
            $table->tinyinteger('featured')->default(0);
            $table->tinyinteger('status')->default(0);
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('course_category_id')->references('id')->on('course_categories')->onDelete('cascade');
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
        Schema::dropIfExists('courses');
    }
}
