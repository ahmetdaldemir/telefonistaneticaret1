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
        Schema::create('virtual_market_attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('virtual_market_attribute_id');
            $table->integer('virtual_market_id');
            $table->integer('categoryId');
            $table->string('required');
            $table->string('varianter');
            $table->string('slicer');
            $table->string('name');
            $table->string('attributeValues');
            $table->softDeletes();
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
        Schema::dropIfExists('virtual_market_attributes');
    }
};
