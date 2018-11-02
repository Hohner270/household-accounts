<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEloquentCardLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('card_id')->unsigned();
            $table->string('store_name');
            $table->datetime('used_date');
            $table->string('used_place');
            $table->string('used_content');
            $table->integer('used_price');
            $table->integer('payment');
            $table->string('payment_times');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('card_id')->references('id')->on('cards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_logs');
    }
}
