<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadDocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_doc', function(Blueprint $t){

        $t->increments('id')->unique();
        $t->integer('user_id');
        $t->string('username');
        $t->string('title');
        $t->string('o_name');
        $t->string('r_name');
        $t->timestamps();
});
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
