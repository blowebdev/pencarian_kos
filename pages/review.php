<style type="text/css">
    .pac-container {
        background-color: #FFF;
        z-index: 2001;
        position: fixed;
        display: inline-block;
        float: left;
    }
    .modal{
        z-index: 2000;
    }
    .modal-backdrop{
        z-index: 1000;
        }​
    </style>

    <?php 
    $id = explode('-', $_REQUEST['id']);
    if (isset($_REQUEST['simpan'])) {
        $lokasi = $_REQUEST['lokasi'];
        $jarak = $_REQUEST['jarak'];
        $pesan_mudah = $_REQUEST['pesan_mudah'];
        $aplikasi = $_REQUEST['aplikasi'];
        $ui = $_REQUEST['ui'];

        $res_cek = mysqli_query($conn,"SELECT * FROM m_review WHERE kode_transaksi='".$id[0]."'");
        $tot_res = mysqli_num_rows($res_cek);
        if ($tot_res>=1) {
            $sql = "UPDATE m_review SET lokasi='".$lokasi."', jarak='".$jarak."', pesan_mudah='".$pesan_mudah."', aplikasi='".$aplikasi."', ui='".$ui."', catatan='".$_REQUEST['catatan']."', id_kos='".$id[1]."' WHERE kode_transaksi='".$id[0]."'";
        }else{
            $sql = "INSERT INTO `m_review`(
            `kode_transaksi`,
            `lokasi`,
            `jarak`,
            `pesan_mudah`,
            `aplikasi`,
            `ui`,
            `id_user`,
            `id_kos`,
            `catatan`) VALUES (
            '".$id[0]."',
            '".$lokasi."',
            '".$jarak."',
            '".$pesan_mudah."',
            '".$aplikasi."',
            '".$ui."',
            '".$_SESSION['id_pelanggan']."',
            '".$id[1]."',
            '".$_REQUEST['catatan']."'
        )";
    } 

    $exc=mysqli_query($conn,$sql);
    if ($exc) {
        echo '
        <div class="alert alert-success alert-dismissible" role="alert">
        <div class="alert-message">
        <strong>Perhatian !! Data berhasil disimpan</strong>
        </div>
        </div>

        <meta http-equiv="refresh" content="1">

        ';
    }else{
        echo '
        <div class="alert alert-danger alert-dismissible" role="alert">
        <div class="alert-message">
        <strong>Perhatian !! Data gagal disimpan</strong>
        </div>
        </div>


        ';
    }

}

$ry = mysqli_query($conn,"SELECT * FROM `m_review` WHERE kode_transaksi='".$id[0]."'");
$datane = mysqli_fetch_array($ry);
?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success collapsed">
            <div class="panel-heading">
                Review Pelanggan
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="input-email" >1. Bagimana lokasi kos dekat dengan fasilitas umum ?</label>
                        <select name="lokasi" class="form-control" style="width: 300px">
                            <option value="">Pilih jawaban</option>
                            <option value="1" <?php echo ($datane['lokasi']==1) ? "selected": ""; ?>>Sangat Tidak Setuju</option>
                            <option value="2" <?php echo ($datane['lokasi']==2) ? "selected": ""; ?>>Tidak Setuju</option>
                            <option value="3" <?php echo ($datane['lokasi']==3) ? "selected": ""; ?>>Netral</option>
                            <option value="4" <?php echo ($datane['lokasi']==4) ? "selected": ""; ?>>Setuju</option>
                            <option value="5" <?php echo ($datane['lokasi']==5) ? "selected": ""; ?>>Sangat Setuju</option>
                        </select>

                        <label for="input-email" >2. Bagimana jarak yang anda tempuh sesuai dengan aplikasi ?</label>
                        <select name="jarak" class="form-control" style="width: 300px">
                            <option value="">Pilih jawaban</option>
                            <option value="1" <?php echo ($datane['jarak']==1) ? "selected": ""; ?>>Sangat Tidak Setuju</option>
                            <option value="2" <?php echo ($datane['jarak']==2) ? "selected": ""; ?>>Tidak Setuju</option>
                            <option value="3" <?php echo ($datane['jarak']==3) ? "selected": ""; ?>>Netral</option>
                            <option value="4" <?php echo ($datane['jarak']==4) ? "selected": ""; ?>>Setuju</option>
                            <option value="5" <?php echo ($datane['jarak']==5) ? "selected": ""; ?>>Sangat Setuju</option>
                        </select>

                        <label for="input-email" >3. Apakah pemesanan mudah dengan aplikasi ini ?</label>
                        <select name="pesan_mudah" class="form-control" style="width: 300px">
                            <option value="">Pilih jawaban</option>
                            <option value="1" <?php echo ($datane['pesan_mudah']==1) ? "selected": ""; ?>>Sangat Tidak Setuju</option>
                            <option value="2" <?php echo ($datane['pesan_mudah']==2) ? "selected": ""; ?>>Tidak Setuju</option>
                            <option value="3" <?php echo ($datane['pesan_mudah']==3) ? "selected": ""; ?>>Netral</option>
                            <option value="4" <?php echo ($datane['pesan_mudah']==4) ? "selected": ""; ?>>Setuju</option>
                            <option value="5" <?php echo ($datane['pesan_mudah']==5) ? "selected": ""; ?>>Sangat Setuju</option>
                        </select>


                        <label for="input-email" >4. Apakah tampilan aplikasi ini bagus ?</label>
                        <select name="aplikasi" class="form-control" style="width: 300px">
                            <option value="">Pilih jawaban</option>
                            <option value="1" <?php echo ($datane['aplikasi']==1) ? "selected": ""; ?>>Sangat Tidak Setuju</option>
                            <option value="2" <?php echo ($datane['aplikasi']==2) ? "selected": ""; ?>>Tidak Setuju</option>
                            <option value="3" <?php echo ($datane['aplikasi']==3) ? "selected": ""; ?>>Netral</option>
                            <option value="4" <?php echo ($datane['aplikasi']==4) ? "selected": ""; ?>>Setuju</option>
                            <option value="5" <?php echo ($datane['aplikasi']==5) ? "selected": ""; ?>>Sangat Setuju</option>
                        </select>

                        <label for="input-email" >5. Apakah UI/UX sudah sesuai ?</label>
                        <select name="ui" class="form-control" style="width: 300px">
                            <option value="">Pilih jawaban</option>
                            <option value="1" <?php echo ($datane['ui']==1) ? "selected": ""; ?>>Sangat Tidak Setuju</option>
                            <option value="2" <?php echo ($datane['ui']==2) ? "selected": ""; ?>>Tidak Setuju</option>
                            <option value="3" <?php echo ($datane['ui']==3) ? "selected": ""; ?>>Netral</option>
                            <option value="4" <?php echo ($datane['ui']==4) ? "selected": ""; ?>>Setuju</option>
                            <option value="5" <?php echo ($datane['ui']==5) ? "selected": ""; ?>>Sangat Setuju</option>
                        </select>

                        <label for="input-email">6. Catatan</label>
                        <textarea class="form-control" placeholder="Catatan" name="catatan" style="width: 300px; height: 100px"><?php echo $datane['catatan']; ?></textarea>
                    </div>
                    <?php if(in_array($_SESSION['level'], array('2'))): ?>
                        <a href="<?php echo $base_url; ?>histori_pemesanan" class="btn btn-danger">Kembali</a>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan Review</button>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>