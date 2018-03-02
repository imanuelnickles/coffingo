<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaction', function (Blueprint $table) {
            $table->increments('id_detail_transaction');
            $table->integer('id_transaction')->unsigned();
            $table->integer('id_product')->unsigned();
            
            $table->foreign('id_transaction')->references('id_transaction')->on('transaction')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transaction');
    }
}
