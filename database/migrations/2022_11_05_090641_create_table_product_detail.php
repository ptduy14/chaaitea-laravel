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
        Schema::create('table_product_detail', function (Blueprint $table) {
            $table->Increments('product_detail_id');
            $table->text('product_detail_desc');
            $table->integer('product_detail_weight');
            $table->date('product_detail_mfg');
            $table->integer('product_detail_exp');
            $table->integer('product_detail_origin');
            $table->text('product_detail_manual');
            $table->integer('product_id');
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
        Schema::dropIfExists('table_product_detail');
    }
};
