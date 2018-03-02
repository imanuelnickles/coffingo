<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailCustomTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_custom_transaction', function (Blueprint $table) {
            $table->increments('id_detail_custom_transaction');
            $table->integer('id_transaction')->unsigned();
            $table->integer('id_coffin')->unsigned();
            $table->integer('id_pattern')->unsigned();
            $table->integer('id_color')->unsigned();
            $table->integer('id_accessories')->unsigned();

            $table->foreign('id_transaction')->references('id_transaction')->on('transaction')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_coffin')->references('id_coffin')->on('coffin')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pattern')->references('id_pattern')->on('pattern')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_color')->references('id_color')->on('color')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_accessories')->references('id_accessories')->on('accessories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_custom_transaction');
    }
}
