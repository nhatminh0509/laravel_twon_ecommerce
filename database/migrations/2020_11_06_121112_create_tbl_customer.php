<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateTblCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_customer', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->Increments('id')->unsigned();
            $table->string('email');
            $table->unique('email');
            $table->string('password');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('total_Amount')->default(0);
            $table->Integer('status')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('tbl_customer')->insert([
            'email'=>'customer@123',
            'password'=> Hash::make('12345'),
            'name'=>'Nhật',
            'phone'=>'0704917152',
            'address'=> 'long an',
            'total_Amount' =>'0',
            'status'=>'1'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_customer');
    }
}
