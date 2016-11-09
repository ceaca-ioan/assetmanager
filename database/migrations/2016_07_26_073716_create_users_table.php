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
        Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('email', 80);
			$table->string('username', 30);
			$table->string('pnc', 20);
            $table->tinyInteger('status')->default(0);
			$table->string('password', 250);
			$table->string('first_name', 30)->nullable();
			$table->string('last_name', 30)->nullable();
			$table->rememberToken();
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
        Schema::drop('users');
    }
}
