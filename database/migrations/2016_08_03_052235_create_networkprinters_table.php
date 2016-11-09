<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNetworkprintersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('networkprinters', function (Blueprint $table) {
            $table->string('id', 10)->primary();
			$table->string('ip', 50);
			$table->string('name', 20);
			$table->string('inv_no', 10);
			$table->string('organization', 30);
			$table->string('department', 30);
			$table->string('section', 30);
			$table->string('address_name', 20);
			$table->string('room', 4);
			$table->string('cis_name', 40);
			$table->string('mark', 30);
			$table->string('model', 30);
			$table->string('mac', 50);
			$table->string('sn', 60);
			$table->string('provenance', 20);
			$table->tinyInteger('ai');
			$table->string('history');
			$table->string('notes');
            $table->timestamps();
			$table->softDeletes();
			$table->string('reason_for_delete');
			$table->text('computers_history');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('networkprinters');
    }
}
