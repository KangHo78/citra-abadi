<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('item_id')->unsigned();
            $table->string('sku')->unique();
            $table->bigInteger('spec_id')->unsigned();
            $table->bigInteger('material_id')->unsigned();
            $table->bigInteger('class_id')->unsigned();
            $table->bigInteger('conn_id')->unsigned();
            $table->bigInteger('size_id')->unsigned();

            $table->timestamps();
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('spec_id')->references('id')->on('specs');
            $table->foreign('material_id')->references('id')->on('materials');
            $table->foreign('class_id')->references('id')->on('classes');
            $table->foreign('conn_id')->references('id')->on('conns');
            $table->foreign('size_id')->references('id')->on('sizes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('item_details');
    }
};
