 
<?php 
$datane = mysqli_fetch_array(mysqli_query($conn,"SELECT c.*, c.nama as kos, d.nama as mitra, a.*, a.nama as pelanggan, b.alamat as alamat_pelanggan FROM m_transaksi as a 
                                                 LEFT JOIN m_pelanggan as b ON a.id_pelanggan = b.id
                                                 LEFT JOIN m_kos as c ON a.id_kos = c.id
                                                 LEFT JOIN m_mitra as d ON c.id_mitra = d.id
                                                 WHERE a.kode_transaksi='".$_REQUEST['id']."'"));
?>
 <div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Invoice <small><?php echo $datane['kode_transaksi']; ?></small></h4>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row margin-b-40">
                    <div class="col-sm-6">
                        <h4><?php echo $datane['nama']; ?></h4>

                        <address>
                            <strong><?php echo $datane['alamat_pelanggan']; ?></strong><br>
                            <abbr title="Phone">Wa/Hp:</abbr> <?php echo $datane['hp']; ?>
                        </address>
                    </div>
                </div>

                <div class="table-responsive margin-b-40">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Kos</th>
                                <th>Tanggal Berkunjung</th>
                                <th>Nama Mitra</th>
                                <th>Harga Perbulan</th>
                                <th>Total Bulan</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $datane['kos']; ?></td>
                                <td><?php echo $datane['tgl_kunjung']; ?></td>
                                <td><?php echo $datane['mitra']; ?></td>
                                <td>Rp. <?php echo number_format($datane['harga']); ?></td>
                                <td><?php echo number_format($datane['total_bulan']); ?></td>
                                <td>Rp. <?php echo number_format($datane['grand_total']); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class='col-md-6'>
                        <h5>Keterangan</h5>
                        <p>
                            Bukti ini adalah bukti sah atas pemesanan kos, mohoh ditunjukan kepada mitra jika anda ingin berkunjung
                        </p>
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                        <table class="table table-striped text-right">
                            <tbody>
                                <tr>
                                    <td><strong>Sub Total :</strong></td>
                                    <td><?php echo number_format($datane['grand_total']); ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Pajak :</strong></td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td><strong>TOTAL :</strong></td>
                                    <td><?php echo number_format($datane['grand_total']); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-right">
                        <div>
                            <button class="btn btn-success" onclick="window.print();"><i class="fa fa-print"></i> Print</button>             
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>