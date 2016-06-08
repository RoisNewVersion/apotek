<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateObatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('obat', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nama_obat', 20)->nullable();
			$table->string('barcode', 20)->nullable();
			$table->integer('golongan')->index('FK_obat_golongan');
			$table->integer('merk')->index('FK_obat_merk');
			$table->integer('supplier')->index('FK_obat_supplier');
			$table->integer('rak')->index('FK_obat_rak');
			$table->integer('diskon')->nullable();
			$table->integer('satuan')->index('FK_obat_satuan');
			$table->integer('isi');
			$table->integer('harga_pokok');
			$table->integer('harga_jual');
			$table->enum('status', array('J','T'));
			$table->date('kadaluarsa');
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
		Schema::drop('obat');
	}

}
