<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSupplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_supplier', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->Increments('id')->unsigned();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
        DB::table('tbl_supplier')->insert([
            'name'=>'Nhật',
            'email'=> 'supplier@123',
            'phone'=>'0704917152',
            'address'=>'Long An',
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
        Schema::dropIfExists('tbl_supplier');
    }
}
