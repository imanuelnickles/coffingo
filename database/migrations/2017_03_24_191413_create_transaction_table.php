<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->increments('id_transaction');
            $table->integer('id_users')->unsigned();
            $table->string('receiver_name');
            $table->string('receiver_address');
            $table->string('receiver_telp');
            $table->integer('total')->unsigned();
            $table->string('status');
            $table->string('payment_image');
            $table->string('reference_code');
            $table->timestamps();
            $table->date('valid_until');
            //Foreign Key
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
