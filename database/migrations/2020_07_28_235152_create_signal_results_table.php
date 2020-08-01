<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignalResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signal_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('signal_id',false);
            $table->string('target_reached'); //target 1
            $table->string('type'); //profit or loss
            $table->text('comment');
            $table->foreign('signal_id')->references('id')->on('signals')->onDelete('cascade');
            $table->tinyinteger('status')->default(0);
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
        Schema::dropIfExists('signal_results');
    }
}
