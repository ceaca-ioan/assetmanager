<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsbtokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usbtokens', function (Blueprint $table) {
            $table->string('id')->primary();
			$table->string('employee_id', 20); 
			$table->string('mark_model', 30); 
			$table->string('classification_level', 20);
			$table->string('registration_no', 10);
			$table->date('registration_date');
			$table->text('history');
			$table->string('notes');
			$table->timestamps();
			$table->softDeletes();
			$table->string('reason_for_delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usbtokens');
    }
}
