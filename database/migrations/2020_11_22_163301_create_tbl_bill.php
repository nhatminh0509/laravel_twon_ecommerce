<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bill', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->Increments('id')->unsigned();

            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('tbl_customer');
            
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('desc')->nullable();

            $table->integer('voucher_id')->unsigned()->nullable();
            $table->foreign('voucher_id')->references('id')->on('tbl_voucher');

            $table->bigInteger('total_Price')->default(0);
            $table->bigInteger('price_Checkout')->default(0);
            $table->date('date_create')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('tbl_bill');
    }
}
