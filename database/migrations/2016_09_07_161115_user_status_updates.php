<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserStatusUpdates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_status', function(Blueprint $t){

    $t->increments('id')->unique();
    $t->longText('status_text');
    $t->string('title');
    $t->integer('users_id')->unsigned();
    $t->string('p_name');
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
