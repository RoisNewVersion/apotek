<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>401 - Apotek</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
	    
	<link href={!! asset("css/bootstrapawal.min.css") !!} rel="stylesheet">

	<link href={!! asset("css/bootstrap-responsive.min.css") !!}  rel="stylesheet">
	
	<link href="css/font-awesome.css" rel="stylesheet">
	    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
	    
	<link href={!! asset("css/style.css") !!} rel="stylesheet">

</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="{!! url('home') !!}">
				Apotek Home 				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					
					<li class="">						
						<a href="{!! url('home') !!}" class="">
							<i class="icon-chevron-left"></i>
							Back to Dashboard
						</a>
						
					</li>
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<div class="container">
	
	<div class="row">
		
		<div class="span12">
			
			<div class="error-container">
				<h1>401</h1>
				
				<h2>Anda tidak diijinkan mengakses resources ini.</h2>
				
				<div class="error-details">
					Sorry, an error has occured! Why not try going back to the <a href="{!! url('home') !!}">home page</a>
					
				</div> <!-- /error-details -->
				
				<div class="error-actions">
					<a href="{!! url('home') !!}" class="btn btn-large btn-primary">
						<i class="icon-chevron-left"></i>
						&nbsp;
						Back to Dashboard						
					</a>
					
					
					
				</div> <!-- /error-actions -->
							
			</div> <!-- /error-container -->			
			
		</div> <!-- /span12 -->
		
	</div> <!-- /row -->
	
</div> <!-- /container -->


<script src={!! asset("js/jquery.min.js") !!}></script>
<script src={!! asset("js/bootstrap.js") !!}></script>
</body>

</html>
