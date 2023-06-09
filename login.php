
<!DOCTYPE html>
<html lang="en">
<?php include "config/koneksi.php"; ?>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Float-Admin</title>

        <!-- Common plugins -->
        <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet">
        <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="plugins/pace/pace.css" rel="stylesheet">
        <link href="plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="plugins/nano-scroll/nanoscroller.css">
        <link rel="stylesheet" href="plugins/metisMenu/metisMenu.min.css">
        <!--for checkbox-->
        <link href="plugins/iCheck/blue.css" rel="stylesheet">
        <!--template css-->
        <link href="css/style.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            html,body{
                height: 100%;
            }
        </style>
    </head>
    <body>

        <div class="misc-wrapper">
            <div class="misc-content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                            <div class="misc-header text-center">
                                <img src="images/logo-default.png" alt="">
                            </div>
                            <div class="misc-box">   
                                <p class="text-center text-uppercase pad-v">Login to continue.</p>
                                <form role="form">
                                    <div class="form-group">                                      
                                        <label class="text-muted" for="exampleuser1">UserName</label>
                                        <div class="group-icon">
                                        <input id="exampleuser1" type="text" placeholder="Username" class="form-control" required="">
                                        <span class="icon-user text-muted icon-input"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted" for="exampleInputPassword1">Password</label>
                                        <div class="group-icon">
                                        <input id="exampleInputPassword1" type="password" placeholder="Password" class="form-control">
                                        <span class="icon-lock text-muted icon-input"></span>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="i-checks" name="remember">
                                                    <span>  Remember Me</span></label>
                                            </div>
                                        </div>
                                        <div class="pull-right">
                                            <button type="submit" class="btn btn-block btn-primary">Login</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class=" text-center">Need to Signup?</p>
                                    <a href="page-register.html" class="btn btn-block btn-default">Register Now</a>
                                </form>
                            </div>
                            <div class="text-center misc-footer">
                                <span>&copy; Copyright 2016 - 2017. Float Admin<br>Bootstrap admin template</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Common plugins-->
        <script src="plugins/jquery/dist/jquery.min.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="plugins/pace/pace.min.js"></script>
        <script src="plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
        <script src="plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="plugins/nano-scroll/jquery.nanoscroller.min.js"></script>
        <script src="plugins/metisMenu/metisMenu.min.js"></script>
        <script src="js/float-custom.js"></script>
        <!--ichecks-->
        <script src="plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue'
                });
            });
        </script>
    </body>

<!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Aug 2017 09:37:23 GMT -->
</html>
