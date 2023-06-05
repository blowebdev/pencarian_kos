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
	<link href="<?php echo $base_url; ?>plugins/chart-c3/c3.min.css" rel="stylesheet">
	<link href="<?php echo $base_url; ?>plugins/iCheck/blue.css" rel="stylesheet">
	<!-- dataTables -->
	<link href="<?php echo $base_url; ?>plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $base_url; ?>plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $base_url; ?>plugins/toast/jquery.toast.min.css" rel="stylesheet">

	<script
  src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBTgPmRwGjuwyazUzzZl6CosQTw1qpUDtY&callback=initMap&libraries=places&v=weekly"
  defer
  ></script>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTgPmRwGjuwyazUzzZl6CosQTw1qpUDtY&callback=initMap">
</script>
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
            <img src="<?php echo $base_url; ?>images/avtar-1.jpg" class="img-circle" width="30" alt="">

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
    <a href="<?php echo $base_url; ?>djikstra" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-bag"></i>Djikstra</a>
  </li>
  <?php if(!empty($_SESSION['username'])) : ?>
    <?php if(in_array($_SESSION['level'], array('1'))) : ?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-bag"></i> Djikstra</a>
        <ul class="dropdown-menu dropdown-main">
          <li><a href="<?php echo $base_url; ?>master_kos">Vertex / Master Kos</a></li>
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
      <a href="<?php echo $base_url; ?>statistik" onclick="alert('Proses pengembangan')" role="button" aria-haspopup="true" aria-expanded="false"><i class=" icon-bar-chart"></i> Laporan</a>
    </li>
    <li class="dropdown">
      <a href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-user"></i> Pengguna</a>
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


<script>
  $(document).ready(function () {
   $('#datatable').dataTable();

 });
</script>

</body>

<!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/layout-horizontal.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Aug 2017 09:34:07 GMT -->
</html>