<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->string('id', 30)->primary();
			$table->string('employee_id', 20);
			$table->string('type', 20);
			$table->string('cis_name', 40);
			$table->string('approval_number', 20);
			$table->date('approval_date');
			$table->tinyInteger('status')->default(1);
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
        Schema::drop('accounts');
    }
}
