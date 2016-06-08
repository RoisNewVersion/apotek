<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>
  @if (Request::segment(1))
    Apotek - {!! ucfirst(Request::segment(1)) !!}
  @endif
  @if (Request::segment(2))
    - {!! ucfirst(Request::segment(2)) !!}
  @else
    {!! 'Apotek' !!}
  @endif


</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">

<meta name="_token" content="{{ csrf_token() }}"/>

<link href={!! asset("css/bootstrapawal.min.css") !!} rel="stylesheet">

<link href={!! asset("css/bootstrap-responsive.min.css") !!}  rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
<link href={!! asset("css/font-awesome.css") !!} rel="stylesheet">
<link href={!! asset("css/style.css") !!} rel="stylesheet">
<link href={!! asset("css/pages/dashboard.css") !!} rel="stylesheet">
<link href={!! asset("css/sweetalert.css") !!} rel="stylesheet">
<link href={!! asset("css/datatables.bootstrap.css") !!} rel="stylesheet">
<link href={!! asset("css/jquery-ui/jquery-ui-1.10.4.css") !!} rel="stylesheet">



<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<style type="text/css">
  .main {
    padding-bottom: 2em;
    border-bottom: 0px;
  }
  .footer-inner {
    padding: 5px 0px;
  }
</style>
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="{!! URL::to('home'); !!}">Apotek Bugel </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">

          {{-- <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Total pendapatan  <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Settings</a></li>
              <li><a href="javascript:;">Help</a></li>
            </ul>
          </li> --}}

          @if (Auth::check())
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                              class="icon-user"></i> {!! Auth::user()->name !!} | {!! Menu::getUserRole() !!}<b class="caret"></b></a>
              <ul class="dropdown-menu">
                
                <li><a href={!! route('logout') !!}>Logout</a></li>
              </ul>
            </li>
          @else
            <li>
              <a href={!! route('login') !!}>Login</a>
            </li>
          @endif
          
        </ul>
        {{-- <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
        </form> --}}
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->