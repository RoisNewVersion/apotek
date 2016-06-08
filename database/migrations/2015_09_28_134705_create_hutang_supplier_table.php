<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHutangSupplierTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hutang_supplier', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('no_faktur', 15);
			$table->integer('supplier_id')->index('FK_hutang_supplier_supplier');
			$table->date('tempo');
			$table->integer('jml_hutang');
			$table->enum('status', array('L','B'));
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
		Schema::drop('hutang_supplier');
	}

}
