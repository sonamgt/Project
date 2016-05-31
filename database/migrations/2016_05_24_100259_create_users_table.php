<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('UserData', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('email_id');
    		$table->string('user_name');
    		$table->string('academics');
    		$table->string('phone_no');
    		$table->string('longitude');
    		$table->string('latitude');
    		$table->longText('description');
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
      // Schema::drop('UserData');
    }
}
 