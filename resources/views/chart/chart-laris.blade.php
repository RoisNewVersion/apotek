@extends('layout.default')
@section('content')
<div class="row">
	{{-- chart hari ini --}}
	<div class="span8">
		<div class="widget">
			<div class="widget-header">
				<i class="icon-bar-chart"></i>
				<h3>Grafik obat paling laris hari ini</h3>
			</div>

			<div class="widget-content">
				<?php
					$nama_obat = [];
					$jumlah = [];

					foreach ($charts as $chart ) {
					 	$nama_obat[] = $chart->nama_obat;
					 	$jumlah[] = $chart->obat_count;
					 	// echo $chart->nama_obat . ' '.$chart->obat_count.'<br>';
					 } 
				?>
				
				{{-- <canvas id="bar-chart" class="chart-holder" width="538" height="250"></canvas> --}}
				<div style="width: 60%">
                    <canvas id="bar-chart" width="350" height="230"></canvas>
                </div>
			</div>
		</div> 
	</div>

	{{-- chart bulan ini --}}
	<div class="span8">
		<div class="widget">
			<div class="widget-header">
				<i class="icon-bar-chart"></i>
				<h3>Grafik obat paling laris bulan ini</h3>
			</div>

			<div class="widget-content">
				<?php
					$nama_obat_bln = [];
					$jumlah_bln = [];

					foreach ($charts_bln as $chart_bln ) {
					 	$nama_obat_bln[] = $chart_bln->nama_obat_bln;
					 	$jumlah_bln[] = $chart_bln->obat_count_bln;
					 	// echo $chart->nama_obat . ' '.$chart->obat_count.'<br>';
					 } 
				?>
				
				{{-- <canvas id="bar-chart" class="chart-holder" width="538" height="250"></canvas> --}}
				<div style="width: 60%">
                    <canvas id="bar-chart_bln" width="350" height="230"></canvas>
                </div>
			</div>
		</div> 
	</div>
</div>
@stop

@section('datatable')
<script type="text/javascript">
	var barChartData = {
	    labels : <?php echo json_encode($nama_obat) ?>,
	    
	    datasets : [
	        {
	            fillColor : "rgba(151,187,205,0.5)",
	            strokeColor : "rgba(151,187,205,0.8)",
	            highlightFill : "rgba(151,187,205,0.75)",
	            highlightStroke : "rgba(151,187,205,1)",
	            data : <?php echo json_encode($jumlah) ?>
	            
	        },
	        
	    ]

	}

	// bulan
	var barChartData_bln = {
	    labels : <?php echo json_encode($nama_obat_bln) ?>,
	    
	    datasets : [
	        {
	            fillColor : "rgba(151,187,205,0.5)",
	            strokeColor : "rgba(151,187,205,0.8)",
	            highlightFill : "rgba(151,187,205,0.75)",
	            highlightStroke : "rgba(151,187,205,1)",
	            data : <?php echo json_encode($jumlah_bln) ?>
	            
	        },
	        
	    ]

	}

	window.onload = function(){
		//hari ini
		var ctx = document.getElementById("bar-chart").getContext("2d");
	    window.myBar = new Chart(ctx).Bar(barChartData, {
	        responsive : true
	    });

	    // bulanan
	    var ctx_bln = document.getElementById("bar-chart_bln").getContext("2d");
	    window.myBar_bln = new Chart(ctx_bln).Bar(barChartData_bln, {
	        responsive : true
	    });
	}

	// var myLine = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(barChartData);
</script>
@stop