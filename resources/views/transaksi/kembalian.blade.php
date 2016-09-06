@extends('layout.default')
@section('content')
<div class="widget">

<?php if(Session::has('dataprint')) { ?>
	<table class="table table-striped table-bordered">
		<tr>
			<th>No.</th>
			<th>Nama Obat</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Total Harga</th>
			<th>Diskon</th>
		</tr>

		<?php 
		$no = 1; 
		$total = 0;
		?>

		@foreach(Session::get('dataprint') as $data)
		<?php 
		$total = $total + $data['total_harga'];
		?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $data->obit->nama_obat?></td>
			<td><?= $data->jumlah?></td>
			<td>Rp <?php echo number_format($data->harga, 0, '', '.')?></td>
			<td>Rp <?php echo number_format($data->total_harga, 0, '', '.') ?></td>
			<td><?= $data->diskon?> %</td>
		</tr>
		<?php $no++; ?>
		@endforeach

		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td><b>Total </b></td>
			<td><b>Rp <?php echo number_format($total, 0, '', '.') ?></b></td>
			<td></td>
		</tr>
	</table>

	<hr>

	<div class="pull-right">
		Uang kembali
		<h1 id="kembalian">Rp. 0</h1>
		
	</div>

	Total bayar <h1><b>Rp <?php echo number_format($total, 0, '', '.') ?></b></h1>

	<input type="hidden" id="total123" value="<?= $total ?>">

	Uang Tunai : <input type="text" id="tunai" name="tunai" value="">
	<br>
{{-- 	<button id="btntunai">Hitung</button> --}}
	<button id="aksicetak" onclick="aksicetak();" class="btn btn-danger">Cetak Nota</button>
	<p></p>
	<a href="{{url('transaksi')}}" class="btn btn-info">Kembali transaksi</a>
<?php } else { 
	redirect()->route('transaksi.index'); 
}

?>

</div> 
@stop

@section('datatable')
<script>
$(document).ready(function(){

	$("#tunai").keyup(function() {
		/* Act on the event */
		var tot = $("#total123").val();
		var tun = $("#tunai").val();

		var hitung = parseInt(tun) -parseInt(tot);

		$("#kembalian").html('Rp. '+hitung);
	});
});
// show popup cetak
	function aksicetak()
	{
		var left = (screen.width/2) - (800/2);
		var right = (screen.height/2) - (640/2);

		var url = '{{url('cetaknota')}}';

		window.open(url, '', 'width=800, height=640, scrollbars=yes, left='+left+', right='+right+'');
	}
</script>
@stop