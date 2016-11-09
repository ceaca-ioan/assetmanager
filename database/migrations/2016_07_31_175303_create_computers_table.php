<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->string('id', 10)->primary();
			$table->string('ip', 15);
			$table->string('name', 20);
			$table->string('inv_no', 10);
			$table->string('holder', 30);
			$table->string('provenance', 20);
			$table->tinyInteger('ai');
			$table->string('organization', 30);
			$table->string('department', 30);
			$table->string('section', 30);
			$table->string('address_name', 20);
			$table->string('room', 4);
			$table->string('os', 30);
			$table->string('cis_name', 40);
			$table->string('hdd_reg_no', 30);
			$table->date('hdd_reg_date');
			$table->string('hdd_sn', 50);
			$table->string('hdd_mark_and_model', 30);
			$table->string('hdd_capacity', 10);
			$table->string('hdd_interface', 5);
			$table->string('optical_drive', 20);
			$table->string('type', 10);
			$table->string('processor_type', 30);
			$table->string('processor_frequency', 10);
			$table->string('motherboard', 30);
			$table->string('sn', 30);
			$table->string('ram_capacity', 10);
			$table->string('ram_type', 10);
			$table->string('mac', 50);
			$table->string('optical_drive_rights');
			$table->string('soft_rights');
			$table->string('privileged_accounts');
			$table->string('usb_rights');
			$table->string('history');
			$table->string('notes');
            $table->timestamps();
			$table->softDeletes();
			$table->string('reason_for_delete');
			$table->text('accounts_history');
			$table->text('peripherals_history');
			$table->text('networkprinters_history');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('computers');
    }
}
