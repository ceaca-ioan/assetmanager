<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeripheralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peripherals', function (Blueprint $table) {
            $table->string('id', 10)->primary();
			$table->string('type', 30);
			$table->string('mark', 40);
			$table->string('model', 40);
			$table->string('sn', 60);
			$table->string('destination');
			$table->string('computer_id', 10);
			$table->text('history');
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
        Schema::drop('peripherals');
    }
}
