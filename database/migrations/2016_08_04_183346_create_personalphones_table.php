<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalphonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalphones', function (Blueprint $table) {
            $table->increments('id');
			$table->string('employee_id', 20); 
			$table->string('mark', 20);
			$table->string('model', 20);
			$table->string('notes', 100);
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
        Schema::drop('personalphones');
    }
}
