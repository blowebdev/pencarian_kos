<?php 
error_reporting(0);
session_start();
include "config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/layout-horizontal.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Aug 2017 09:34:07 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Kos</title>

	<!-- Common plugins -->
	<link href="<?php echo $base_url; ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $base_url; ?>plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet">
	<link href="<?php echo $base_url; ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo $base_url; ?>plugins/pace/pace.css" rel="stylesheet">
	<link href="<?php echo $base_url; ?>plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $base_url; ?>plugins/nano-scroll/nanoscroller.css">
	<link href="<?php echo $base_url; ?>plugins/iCheck/blue.css" rel="stylesheet">
	<!-- dataTables -->
	<link href="<?php echo $base_url; ?>plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $base_url; ?>plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $base_url; ?>plugins/toast/jquery.toast.min.css" rel="stylesheet">
  <script src="<?php echo $base_url; ?>chart/canvasjs.min.js"></script>
 

  
  <script type="text/javascript">
   function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else {
      console.log("Geolocation is not supported by this browser.");
    }
  }

  function showPosition(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    document.getElementById('latitudeInput').value = lat;
    document.getElementById('longitudeInput').value = lng;
  }

  window.onload = getLocation;
</script>
<script
src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBTgPmRwGjuwyazUzzZl6CosQTw1qpUDtY&callback=initMap&libraries=places&v=weekly"
defer
></script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTgPmRwGjuwyazUzzZl6CosQTw1qpUDtY&callback=initMap"></script>
<!--  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&key=AIzaSyBTgPmRwGjuwyazUzzZl6CosQTw1qpUDtY&callback=initMap"></script> -->
<!--template css-->
<link href="<?php echo $base_url; ?>css/style.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
      <body class="layout-horizontal">

       <!--top bar start-->
       <div class="top-bar bg-primary"><!--by default top bar is dark, add .light-top-bar class to make it light-->
        <div class="container">
         <div class="row">
          <div class="col-xs-6">
           <a href="index.html" class="admin-logo">
            <h1>K<i class="fa fa-dashboard"></i>S</h1>
          </a>
          <!--start search form-->

          <!--end search form-->
        </div>
        <div class="col-xs-6">
         <ul class="list-inline top-right-nav">
          <?php if(in_array($_SESSION['level'],array('x'))):  ?>
            <li class="dropdown hidden-xs icon-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <i class="glyphicon glyphicon-bell"></i>
                <span class="badge badge-danger">6</span>
              </a>
              <ul class="dropdown-menu top-dropdown lg-dropdown notification-dropdown">
                <li>
                  <div class="dropdown-header"><a href="<?php echo $base_url; ?>histori_pemesanan" class="pull-right text-muted"><small>View All</small></a> Notifications </div>
                  <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;"><div class="scrollDiv" style="overflow: hidden; width: auto; height: 250px;">
                    <div class="notification-list">
                      <a href="javascript: void(0);" class="clearfix">
                        <span class="notification-icon"><i class="icon-cloud-upload text-primary"></i></span> 
                        <span class="notification-title">Upload Complete</span>
                        <span class="notification-description">Praesent dictum nisl non est sagittis luctus.</span>
                        <span class="notification-time">40 minutes ago</span>
                      </a>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          <?php endif; ?>
        </li>
        <?php if(!empty($_SESSION['username'])) : ?>
          <li class="dropdown avtar-dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="data:image/png;base64,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" class="img-circle" width="30" alt="">

          </a>
          <ul class="dropdown-menu top-dropdown">
            <li><a href="#"><?php echo $_SESSION['nama']; ?></a></li>
            <li class="divider"></li>
            <li><a href="<?php echo $base_url; ?>logout"><i class="icon-logout"></i> Logout</a></li>
          </ul>
        </li>
        <?php else : ?>
         <ul class="list-inline top-right-nav">
          <li class="dropdown avtar-dropdown"><a href="<?php echo $base_url; ?>login">Login</a></li>
        </ul>
      <?php endif; ?>

    </ul> 
  </div>
</div>
</div>
</div>
<!-- top bar end-->

<!--right side bar panel-->

<!--end right side bar panel-->

<!--Main nav start-->
<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
   <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
     <span class="sr-only">Toggle navigation</span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
   </button>
 </div>
 <div id="navbar" class="navbar-collapse collapse">
  <ul class="nav navbar-nav">
   <li class="dropdown active">
    <a href="<?php echo $base_url; ?>" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-home"></i> Dashboard</a>
  </li>
  <li class="dropdown">
    <a href="<?php echo $base_url; ?>maps" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-map"></i> Sebaran</a>
  </li>

  <?php if(!in_array($_SESSION['level'], array('1'))) : ?>
   <!--  <li class="dropdown">
      <a href="<?php echo $base_url; ?>djikstra" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-bag"></i>Djikstra</a>
    </li> -->
  <?php endif; ?>
  <?php if(!empty($_SESSION['username'])) : ?>
    <?php if(in_array($_SESSION['level'], array('1'))) : ?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-bag"></i> Master</a>
        <ul class="dropdown-menu dropdown-main">
          <li><a href="<?php echo $base_url; ?>master_kos">Master Kos</a></li>
          <li><a href="<?php echo $base_url; ?>graph">Graph</a></li>
          <li><a href="<?php echo $base_url; ?>djikstra">Djikstra</a></li>
        </ul>
      </li>
    <?php endif; ?>
    <?php if(in_array($_SESSION['level'], array('3'))) : ?>
      <li class="dropdown">
        <a href="<?php echo $base_url; ?>master_kos" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-bag"></i> Kos</a>
      </li>
      <li class="dropdown">
        <a href="<?php echo $base_url; ?>histori_pemesanan" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-list"></i> Pesanan</a>
      </li>
      <li class="dropdown">
        <a href="<?php echo $base_url; ?>statistik" onclick="alert('Proses pengembangan')" role="button" aria-haspopup="true" aria-expanded="false"><i class=" icon-bar-chart"></i> Laporan</a>
      </li>
    <?php endif; ?>

    <?php if(in_array($_SESSION['level'], array('1','2'))) : ?>
      <li class="dropdown">
       <a href="<?php echo $base_url; ?>histori_pemesanan" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-list"></i> Pesanan</a>
     </li>
   <?php endif; ?>
   <?php if(in_array($_SESSION['level'], array('1'))) : ?>
    <li class="dropdown">
      <a href="<?php echo $base_url; ?>statistik" role="button" aria-haspopup="true" aria-expanded="false"><i class=" icon-bar-chart"></i> Laporan</a>
    </li>
    <li class="dropdown">
      <a href="<?php echo $base_url; ?>users" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-user"></i> Pengguna</a>
    </li>
  <?php endif; ?>
  <li class="dropdown">
    <a href="<?php echo $base_url; ?>logout" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-login"></i> Logout</a>
  </li>
  <?php else : ?>
    <li class="dropdown">
      <a href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-question"></i>Faq</a>
    </li>
    <li class="dropdown">
      <a href="<?php echo $base_url; ?>login" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-login"></i> Login</a>
    </li>
  <?php endif;  ?>
</ul>

</div><!--/.nav-collapse -->
</div><!--/.container-fluid -->
</nav>
<!--MAin nav end-->


<!--start page content-->
<div class="h-main-content">
  <div class="container">
   <?php 

   if (file_exists("pages/".$_GET['page'].".php")) {
    if($_GET['page']!="home"){
     include"pages/".$_GET['page'].".php";
   }else{
     include"pages/home.php";
   }
 }else{
  include"pages/home.php";
} 
?>

</div>
</div>

<!--end page content-->


<!--Common plugins-->
<script src="<?php echo $base_url; ?>plugins/jquery/dist/jquery.min.js"></script>
<script src="<?php echo $base_url; ?>plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $base_url; ?>plugins/pace/pace.min.js"></script>
<script src="<?php echo $base_url; ?>plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
<script src="<?php echo $base_url; ?>plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo $base_url; ?>plugins/nano-scroll/jquery.nanoscroller.min.js"></script>
<script src="<?php echo $base_url; ?>plugins/metisMenu/metisMenu.min.js"></script>
<script src="<?php echo $base_url; ?>js/float-custom.js"></script>
<!--page script-->
<script src="<?php echo $base_url; ?>plugins/chart-c3/d3.min.js"></script>
<script src="<?php echo $base_url; ?>plugins/chart-c3/c3.min.js"></script>
<!-- iCheck for radio and checkboxes -->
<script src="<?php echo $base_url; ?>plugins/iCheck/icheck.min.js"></script>
<!-- Datatables-->
<script src="<?php echo $base_url; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $base_url; ?>plugins/datatables/dataTables.responsive.min.js"></script>

<!--page script-->
<script src="<?php echo $base_url; ?>js/float-custom.js"></script>
<script src="<?php echo $base_url; ?>plugins/chartJs/Chart.min.js"></script>
<script src="<?php echo $base_url ?>js/ckeditor.js"></script>

<script type="text/javascript"></script>

<script>
  $(document).ready(function () {
   $('#datatable').dataTable({order: [[5, 'desc']]});
   ClassicEditor.create( document.querySelector( '#deskripsi' ) ).catch( error => {
    console.error( error );
  });
 });
</script>

</body>

<!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/layout-horizontal.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Aug 2017 09:34:07 GMT -->
</html>