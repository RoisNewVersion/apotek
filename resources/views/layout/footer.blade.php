<div class="navbar navbar-fixed-bottom">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> Copyright &copy; Apotek Bugel <?= date('Y') ?> </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src={!! asset("js/jquery.min.js") !!}></script>
<script src={!! asset("js/excanvas.min.js") !!}></script> 
<script src={!! asset("js/Chart.js") !!} type="text/javascript"></script> 
<script src={!! asset("js/bootstrap.js") !!}></script>
<script src={!! asset("js/base.js") !!}></script> 
<script src={!! asset("js/sweetalert.min.js") !!}></script> 
<script src={!! asset("js/jquery.dataTables.min.js") !!}></script>
<script src={!! asset("js/datatables.bootstrap.js") !!}></script> 
<script src={!! asset("js/jquery-ui-1.10.4.js") !!}></script> 

@include('sweet::alert')

@yield('datatable')
</body>
</html>
