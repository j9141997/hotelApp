<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id', 10);
            $table->string('name', 50);
            $table->integer('type_id')->unsigned();
            $table->string('postal', 7);
            $table->string('address', 200);
            $table->time('checkin_time');
            $table->time('checkout_time');
            $table->string('image');
            $table->boolean('hotel_exist');
            $table->timestamps();

            //外部キー
            $table->foreign('type_id')
                  ->references('id')
                  ->on('types')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
