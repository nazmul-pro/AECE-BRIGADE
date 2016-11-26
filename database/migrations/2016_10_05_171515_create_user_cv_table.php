<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('users_cv', function(Blueprint $t){

            $t->increments('id')->unique();
            $t->integer('users_id')->unsigned();
            $t->string('users_name');
            $t->string('title');
            $t->longText('details');       
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
