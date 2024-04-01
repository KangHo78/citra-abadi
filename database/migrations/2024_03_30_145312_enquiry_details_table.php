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
        Schema::create('enquiry_detail', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('enquiry_id')->unsigned();
            $table->bigInteger('item_id')->unsigned();
            $table->integer('item_price');
            $table->integer('item_quantity');

            $table->timestamps();
            $table->foreign('enquiry_id')->references('id')->on('enquiries');
            $table->foreign('item_id')->references('id')->on('items');
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