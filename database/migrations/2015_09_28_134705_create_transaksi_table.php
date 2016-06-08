<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransaksiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transaksi', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('obat_id')->index('FK_transaksi_obat');
			$table->integer('jumlah');
			$table->integer('harga');
			$table->integer('total_harga');
			$table->integer('diskon');
			$table->integer('untung');
			$table->enum('status', array('Y','N'));
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
		Schema::drop('transaksi');
	}

}
