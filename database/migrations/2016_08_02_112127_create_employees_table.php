<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->string('id', 20)->primary();
			$table->string('first_name', 30);
			$table->string('last_name', 30);
			$table->string('father_last_name', 30);
			$table->string('rank', 30);
			$table->string('position', 40);
			$table->string('organization', 30);
			$table->string('department', 30);
			$table->string('section', 30);
			$table->string('work_phone_no', 20);
			$table->string('personal_phone_no', 20);
			$table->string('notes');
            $table->timestamps();
			$table->softDeletes();
			$table->string('reason_for_delete');
			$table->text('accounts_history');
			$table->text('computers_history');
			$table->text('usbtokens_history');
			$table->text('personalphones_history');
			$table->text('authorizations_history');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
