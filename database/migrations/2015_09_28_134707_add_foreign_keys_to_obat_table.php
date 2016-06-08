<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToObatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('obat', function(Blueprint $table)
		{
			$table->foreign('golongan', 'FK_obat_golongan')->references('id')->on('golongan')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('merk', 'FK_obat_merk')->references('id')->on('merk')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('rak', 'FK_obat_rak')->references('id')->on('rak')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('satuan', 'FK_obat_satuan')->references('id')->on('satuan')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('supplier', 'FK_obat_supplier')->references('id')->on('supplier')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('obat', function(Blueprint $table)
		{
			$table->dropForeign('FK_obat_golongan');
			$table->dropForeign('FK_obat_merk');
			$table->dropForeign('FK_obat_rak');
			$table->dropForeign('FK_obat_satuan');
			$table->dropForeign('FK_obat_supplier');
		});
	}

}
