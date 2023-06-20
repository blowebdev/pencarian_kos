 <?php 
 $id = $_REQUEST['id'];
 if (empty($_SESSION['username'])) {
    echo  "<i class='text-danger'>Maaf anda harus login terlebih dahulu</i>";
    exit;
 }
 ?>
 <div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Data pemesanan
            </div>
            <div class="panel-body">
                <form method="POST" action="<?php echo $base_url ?>act_pemesanan" class="form-horizontal" enctype="multipart/form-data">
                    <fieldset>
                       <div class="form-group">
                        <label class="col-sm-2 control-label">Data Kos</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
                            <input type="hidden" name="kode_transaksi" value="<?php echo generateUniqueTransactionCode() ?>">
                            <?php 
                            $res = mysqli_query($conn,"SELECT * FROM m_kos WHERE id='".$id."'");
                            $dt = mysqli_fetch_array($res);
                            ?>
                            
                            <table style="width: 60%" class="table table-bordered">
                                <tr>
                                    <td colspan="2" style="text-align: center;">
                                        <img src="<?php echo $base_url; ?>upload/<?php echo $dt['gambar']; ?>" style="width:40%; height: 30%">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>: <?php echo $dt['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>: <?php echo $dt['harga']; ?> / Bulan</td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>: <?php echo $dt['deskripsi']; ?></td>
                                </tr>
                                <tr>
                                    <td>Direction</td>
                                    <td>: <a href="https://www.google.com/maps/dir/?api=1&origin=Current+Location&destination=<?php echo $dt['lat']; ?>,<?php echo $dt['lng']; ?>" target="_blank" class="btn btn-danger">Cek Lokasi</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tanggal berkunjung</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" name="tgl_berkunjung" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Harga /Bulan</label>
                        <div class="col-sm-6">
                            <input type="integer" readonly="" class="form-control" id="harga_bulan" name="harga_bulan" value="<?php echo $dt['harga']; ?>" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Total bulan</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="total" id="total_bulan" onchange="total_hitung();" required="">
                                <option value="">Pilih bulan</option>
                                <?php for ($i=1; $i <=12 ; $i++) : ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nama" value="<?php echo $_SESSION['nama']; ?>" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">WA</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="hp" value="<?php echo $_SESSION['user_detail']['hp']; ?>" required="">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Pembayaran</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="pembayaran" required="">
                                <option value="">Pilih pembayaran</option>
                                <option value="cash_mitra">Cash Dilokasi</option>
                            </select>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Grand Total</label>
                        <div class="col-sm-6">
                            <input type="text" readonly="" class="form-control" name="grand_total" id="grand_total2" required="">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-6">
                          Ringkasan pemesanan <br>
                          Harga perbulan = <?php echo $dt['harga']; ?> <br>
                          Rencana sewa = <label id="rencana_bulan"></label> Bulan <br>
                          Total Bulan = <label id="grand_total"></label>
                      </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                        <button class="btn btn-teal btn-rounded" type="submit" name="simpan">Pesan Sekarang</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</div>
</div>
<script type="text/javascript">
   

    function total_hitung() {
        var total_bulan = parseInt($("#total_bulan").val());
        var harga = parseInt($("#harga_bulan").val());

        const total_harga = (total_bulan*harga);
        $("#grand_total").html(total_harga);
        $("#grand_total2").val(total_harga);
        $("#rencana_bulan").html(total_bulan);
        // alert('sasaksajk');
    }
</script>