<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_issues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asset_id');
            $table->integer('user_id');
            $table->boolean('issue');
            $table->date('date_of_issue');
            $table->integer('request_id');
            $table->date('receivedate')->nullable();
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
        Schema::dropIfExists('asset_issues');
    }
}
