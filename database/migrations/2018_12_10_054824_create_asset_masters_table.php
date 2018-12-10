<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_masters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category');
            $table->integer('item_id');
            $table->string('product_id');
            $table->string('asset_no');
            $table->tinyInteger('in_stock')->default(1);
            $table->integer('user_id')->nullable();
            $table->integer('section')->nullable();
            $table->string('location');
            $table->tinyInteger('disposed')->default(0);
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
        Schema::dropIfExists('asset_masters');
    }
}
