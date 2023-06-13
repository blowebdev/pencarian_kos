
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success collapsed">
            <div class="panel-body">
                <table id="datatable" class="table table-striped dt-responsive nowrap">
                    <thead class="bg-success">
                        <tr>
                            <th>Foto</th>
                            <th>Tanggal</th>
                            <th>Pelanggan</th>
                            <th>Kos</th>
                            <th>Mitra</th>
                            <th>Tanggal Kunjung</th>
                            <th>Harga / Bulan</th>
                            <th>Total Bulan</th>
                            <th>Grand Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php 
                       $no=1;
                        if (in_array($_SESSION['level'],array('3'))) {
                            $filter = "WHERE d.id='".$_SESSION['id_mitra']."'";
                        }elseif (in_array($_SESSION['level'],array('2'))) {
                            $filter = "WHERE a.id_pelanggan='".$_SESSION['id_pelanggan']."'";
                        }else{
                            $filter = "";
                        }
                       $q = mysqli_query($conn,"SELECT c.*, c.nama as kos, d.nama as mitra, a.*, a.nama as pelanggan, b.alamat as alamat_pelanggan FROM m_transaksi as a 
                           LEFT JOIN m_pelanggan as b ON a.id_pelanggan = b.id
                           LEFT JOIN m_kos as c ON a.id_kos = c.id
                           LEFT JOIN m_mitra as d ON c.id_mitra = d.id
                           $filter
                           ");
                       while ($d = mysqli_fetch_array($q)) :
                           ?>
                           <tr>
                               <td>
                                  <img src="<?php echo $base_url; ?>upload/<?php echo $d['gambar']; ?>" style="width:200px; height: 100px">
                              </td>
                              <td><?php echo $d['tgl_pemesanan']; ?></td>
                              <td><?php echo $d['pelanggan']; ?></td>
                              <td style="font-weight: bold;"><?php echo $d['kos']; ?></td>
                              <td><?php echo $d['mitra']; ?></td>
                              <td><?php echo $d['tgl_kunjung']; ?></td>
                              <td><?php echo $d['harga']; ?></td>
                              <td><?php echo $d['total_bulan']; ?></td>
                              <td><?php echo $d['grand_total']; ?></td>
                              <td nowrap="">
                               <form action="<?php echo $base_url; ?>invoice/<?php echo $d['kode_transaksi']; ?>" method="POST">
                                   <button type="submit" name="pesan" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>
                               </form>
                           </td>
                       </tr>
                   <?php endwhile; ?>
               </tbody>
           </table>
       </div>
   </div>
</div>
</div>

