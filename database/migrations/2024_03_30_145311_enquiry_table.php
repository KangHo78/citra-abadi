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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->dateTime('date');
            $table->string('desc');
            $table->integer('status'); // 1 = permintaan masuk, 2 = penawaran terkirim, 3 = follow up, 4 = cancel, 5 = deal
            $table->bigInteger('customer_id')->unsigned();
            $table->double('price');
            $table->double('discount');
            // $table->integer('discount_type'); // 1 = amount, 2 = %
            $table->integer('grand_total');

            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('users');
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
