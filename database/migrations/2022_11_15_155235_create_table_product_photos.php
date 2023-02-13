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
        Schema::create('table_product_photos', function (Blueprint $table) {
            $table->Increments('product_photos_id');
            $table->string('product_photo_1st');
            $table->string('product_photo_2nd');
            $table->string('product_photo_3rd');
            $table->string('product_photo_4th');
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
        Schema::dropIfExists('table_product_photos');
    }
};
