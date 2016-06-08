<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Login - Apotek</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href={!! asset("css/bootstrapawal.min.css") !!} rel="stylesheet">
<link href={!! asset("css/bootstrap-responsive.min.css") !!}  rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href={!! asset("css/font-awesome.css") !!} rel="stylesheet">
<link href={!! asset("css/style.css") !!} rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href={!! asset("css/pages/signin.css") !!} rel="stylesheet" type="text/css">

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
			
			<a class="brand" href="index.html">
				Apotek Bugel				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					
					{{-- <li class="">						
						<a href="signup.html" class="">
							Don't have an account?
						</a>
						
					</li> --}}
					
					<li class="">						
						<a href={!! URL::to('/') !!} class="">
							<i class="icon-chevron-left"></i>
							Back to Homepage
						</a>
						
					</li>
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<div class="account-container">
	
	<div class="content clearfix">
		
		<form action="login" method="post">
		
			<h1>Admin Login</h1>		
			
			<div class="login-fields">

			@if (Session::has('pesan'))
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>{!! Session::get('pesan') !!}</strong> 
				</div>
			@endif

				<p>Please provide your details</p>

				{!! csrf_field() !!}
				
				<div class="field">
					<label for="email">Email</label>
					<input type="text" id="email" name="email" value="" placeholder="E-mail" class="login username-field" autofocus required/>
					{!!$errors->first('email', '<p class="help-block">:message</p>')!!}
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field" required=""/>
					{!!$errors->first('password', '<p class="help-block">:message</p>')!!}
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<span class="login-checkbox">
					<input id="check" name="check" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Keep me signed in</label>
				</span>
									
				<button class="button btn btn-success btn-large">Login In</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->



{{-- <div class="login-extra">
	<a href="#">Reset Password</a>
</div> --}} <!-- /login-extra -->



<script src={!! asset("js/jquery-1.7.2.min.js") !!}></script> 
<script src={!! asset("js/bootstrapawal.js") !!}></script>
<script src={!! asset("js/signin.js") !!}></script>

</body>

</html>
