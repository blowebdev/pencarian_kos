 <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="widget bg-primary padding-0">
            <div class="row row-table">
                <div class="col-xs-4 text-center pv-15 bg-light-dark">
                    <em class="icon-cloud-upload fa-3x"></em>
                </div>
                <?php 
                    $total_pesanan = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM m_transaksi"));
                ?>
                <div class="col-xs-8 pv-15 text-center">
                    <h2 class="mv-0"><?php echo $total_pesanan; ?></h2>
                    <div class="text-uppercase">Pesanan</div>
                </div>
            </div>
        </div><!--end widget-->
    </div><!--end col-->
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="widget bg-teal padding-0">
            <div class="row row-table">
                <div class="col-xs-4 text-center pv-15 bg-light-dark">
                    <em class="icon-bag fa-3x"></em>
                </div>
                 <?php 
                    $total_pelanggan = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM m_pelanggan"));
                ?>
                <div class="col-xs-8 pv-15 text-center">
                    <h2 class="mv-0"><?php echo $total_pelanggan; ?></h2>
                    <div class="text-uppercase">Pengguna</div>
                </div>
            </div>
        </div><!--end widget-->
    </div><!--end col-->
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="widget bg-success padding-0">
            <div class="row row-table">
                <div class="col-xs-4 text-center pv-15 bg-light-dark">
                    <em class="icon-users fa-3x"></em>
                </div>
                 <?php 
                    $total_mitra = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM m_mitra"));
                ?>
                <div class="col-xs-8 pv-15 text-center">
                    <h2 class="mv-0"><?php echo $total_mitra; ?></h2>
                    <div class="text-uppercase">Mitra</div>
                </div>
            </div>
        </div><!--end widget-->
    </div><!--end col-->
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="widget bg-indigo padding-0">
            <div class="row row-table">
                <div class="col-xs-4 text-center pv-15 bg-light-dark">
                    <em class="icon-cloud-download fa-3x"></em>
                </div>
                 <?php 
                    $total_kos = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM m_kos"));
                ?>
                <div class="col-xs-8 pv-15 text-center">
                    <h2 class="mv-0"><?php echo $total_kos; ?></h2>
                    <div class="text-uppercase">Jumlah kos</div>
                </div>
            </div>
        </div><!--end widget-->
    </div><!--end col-->
</div>
