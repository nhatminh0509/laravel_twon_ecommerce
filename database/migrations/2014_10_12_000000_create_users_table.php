<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->Increments('id')->unsigned();
            $table->string('email');
            $table->unique('email');
            $table->string('password');
            $table->string('name');
            $table->string('cmnd')->nullable();
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->Integer('status')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert([
            'email'=>'admin@123',
            'password'=> Hash::make('12345'),
            'name'=>'Nhật',
            'cmnd'=> '301733153',
            'phone'=>'0704917152',
            'avatar'=>'nhat.jpg',
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
        Schema::dropIfExists('users');
    }
}
