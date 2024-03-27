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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sku')->unique();
            $table->text('description')->nullable();
            $table->bigInteger('brand_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('subcategory_id_1')->unsigned()->nullable();
            $table->bigInteger('subcategory_id_2')->unsigned()->nullable();
            $table->bigInteger('subcategory_id_3')->unsigned()->nullable();
            $table->bigInteger('subcategory_id_4')->unsigned()->nullable();
            $table->bigInteger('subcategory_id_5')->unsigned()->nullable();
            $table->bigInteger('subcategory_id_6')->unsigned()->nullable();
            $table->string('photos')->nullable();
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('subcategory_id_1')->references('id')->on('categories');
            $table->foreign('subcategory_id_2')->references('id')->on('categories');
            $table->foreign('subcategory_id_3')->references('id')->on('categories');
            $table->foreign('subcategory_id_4')->references('id')->on('categories');
            $table->foreign('subcategory_id_5')->references('id')->on('categories');
            $table->foreign('subcategory_id_6')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
