<?php 
if (isset($_POST['login'])) {
    $username  = $_POST['username'];
    $password  = md5($_POST['password']);
    $query = mysqli_query($conn,"SELECT * FROM `m_user` WHERE username = '$username' AND password = '$password'");
    $cek = mysqli_num_rows($query);
    $data = mysqli_fetch_array($query);
    if ($cek > 0) {
        $_SESSION['level'] = $data['level'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama']   = $data['nama'];
        $_SESSION['id']= $data['user_id'];?>
        <script>
            window.location = "./"
        </script>
    <?php }else{
        $username  = $_POST['username'];
        $password  = md5($_POST['password']);
        $query = mysqli_query($conn,"SELECT * FROM `m_mitra` WHERE username = '$username' AND password = '$password'");
        $cek = mysqli_num_rows($query);
        $data = mysqli_fetch_array($query);
        if ($cek > 0) {
            $_SESSION['level'] = 2;
            $_SESSION['username'] = $data['username'];
            $_SESSION['id_pelanggan'] = $data['id'];
            $_SESSION['nama']   = $data['nama'];
            $_SESSION['user_detail']   = $data;
            ?>
            <?php if($_SESSION['level']=='admin') : ?>
                <script>
                    window.location = "./"
                </script>
                <?php else: ?>
                    <script>
                        window.location = "./"
                    </script>
                <?php endif; 
            }else{
                echo '
                <div class="alert alert-danger alert-dismissible" role="alert">
                <div class="alert-message">
                <strong>Perhatian !! username Atau password Salah, Silahkan cek kembali</strong>
                </div>
                </div>

                <meta http-equiv="refresh" content="1">

                ';
            }
        }
    }
    ?>  
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <div class="misc-header text-center">
                    <label style="color: white; font-weight: bold; font-size: 30px">Djikstra</label>
                </div>
                <div class="misc-box">   
                    <p class="text-center text-uppercase pad-v">Login untuk memulai</p>
                    <form role="form" action="" method="POST">
                        <div class="form-group">                                      
                            <label class="text-muted">Username</label>
                            <div class="group-icon">
                                <input type="text" placeholder="Username" name="username" class="form-control" required="">
                                <span class="icon-user text-muted icon-input"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-muted">Password</label>
                            <div class="group-icon">
                                <input type="password" placeholder="Password" name="password" class="form-control">
                                <span class="icon-lock text-muted icon-input"></span>
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="pull-left">
                                <div class="checkbox">
                                    <label></label>
                                </div>
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-block btn-primary" name="login">Login</button>
                                <a href="<?php echo $base_url; ?>register" class="btn btn-block btn-danger">Register</a>
                            </div>
                        </div>
                    </form>
                    <br>
                    <span>&copy; Copyright 2023</span>
                </div>

            </div>
        </div>
    </div>