<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHutangSupplierTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hutang_supplier', function(Blueprint $table)
		{
			$table->foreign('supplier_id', 'FK_hutang_supplier_supplier')->references('id')->on('supplier')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hutang_supplier', function(Blueprint $table)
		{
			$table->dropForeign('FK_hutang_supplier_supplier');
		});
	}

}
