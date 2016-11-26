<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserStatusComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_status_comments', function(Blueprint $t){

    $t->increments('id');
    $t->longText('comment_text');
    $t->integer('user_id');
    $t->string('c_name');
    $t->string('avatar')->default('default.jpg');
    $t->integer('status_id');
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
