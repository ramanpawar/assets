<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->boolean('consumable');
            $table->integer('asset_id')->nullable();
            $table->integer('item_id');
            $table->integer('approved');
            $table->date('approval_date')->nullable();
            $table->boolean('received');
            $table->integer('asset_id');
            $table->date('date_of_receiving')->nullable();
            $table->string('remarks')->default('0');
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
        Schema::dropIfExists('requests');
    }
}
