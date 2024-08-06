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
        Schema::create('products', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->double('price',10,2);
            $table->string('name');
            $table->string('costPerItem');
            $table->text('description');
            $table->string('img');
            $table->string('code');
            $table->longText('imgList');
            $table->double('retail_price',10,2);
            $table->string('modelcode');
            $table->boolean('status')->default(1);
            $table->boolean('bundle')->default(0);
            $table->mediumInteger('stock');
            $table->json('tags');
            $table->mediumInteger('taxRate');
            $table->boolean('free_shipping')->default(0);


            $table->unsignedBigInteger('brand');
            $table->foreign('brand')->references('id')->on('brands')->onDelete('cascade');

            $table->unsignedBigInteger('category');
            $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');

            $table->unsignedBigInteger('version');
            $table->foreign('version')->references('id')->on('versions')->onDelete('cascade');



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
        Schema::dropIfExists('products');
    }
};
