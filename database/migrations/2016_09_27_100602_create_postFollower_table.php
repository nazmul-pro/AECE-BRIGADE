<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostFollowerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('post_followers', function (Blueprint $t) {
            $t->increments('id')->unique();            
            $t->integer('status_id')->unsigned();
            $t->integer('users_id')->unsigned();
            $t->string('follower');
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
