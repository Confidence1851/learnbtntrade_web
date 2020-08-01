<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signals', function (Blueprint $table) {
            $table->id();
            $table->string('currency');
            $table->string('type');
            $table->string('price_range');
            $table->string('profit_1');
            $table->string('profit_2');
            $table->string('profit_3');
            $table->string('profit_4');
            $table->string('profit_5');
            $table->string('profit_6');
            $table->string('stop_loss');
            $table->text('comment');
            $table->tinyinteger('featured')->default(0);
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
        Schema::dropIfExists('signals');
    }
}
