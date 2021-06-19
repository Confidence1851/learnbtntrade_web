<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFieldsToTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testimonials', function (Blueprint $table) {
            if (!Schema::hasColumn('testimonials', 'content_image')) {
                $table->string("content_image")->nullable()->after("content");
            }
            if (!Schema::hasColumn('testimonials', 'content_type')) {
                $table->string("content_type")->default("text")->after("content");
            }
            if (Schema::hasColumn('testimonials', 'content')) {
                $table->longText("content")->nullable()->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testimonials', function (Blueprint $table) {
            //
        });
    }
}
