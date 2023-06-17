
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
              <th>Status</th>
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
          $q = mysqli_query($conn,"SELECT c.*, c.id as id_kos, c.nama as kos, d.nama as mitra, a.*, a.nama as pelanggan, b.alamat as alamat_pelanggan, date(tgl_pemesanan) as tgl FROM m_transaksi as a 
           LEFT JOIN m_pelanggan as b ON a.id_pelanggan = b.id
           LEFT JOIN m_kos as c ON a.id_kos = c.id
           LEFT JOIN m_mitra as d ON c.id_mitra = d.id
           $filter
           ");
          while ($d = mysqli_fetch_array($q)) :
           ?>
           <tr>
             <td>
              <img src="<?php echo $base_url; ?>upload/<?php echo $d['gambar']; ?>" style="width:100px; height: 50px">
            </td>
            <td><?php echo $d['tgl']; ?></td>
            <td><?php echo $d['pelanggan']; ?></td>
            <td style="font-weight: bold;"><?php echo $d['kos']; ?></td>
            <td><?php echo $d['mitra']; ?></td>
            <td><?php echo $d['tgl_kunjung']; ?></td>
            <td><?php echo number_format($d['harga']); ?></td>
            <td><?php echo $d['total_bulan']; ?></td>
            <td><?php echo number_format($d['grand_total']); ?></td>
            <td>
              <?php 
              echo status($d['status']);
              ?>
            </td>
            <td nowrap="">
              <div class="buttons">
                <div class="btn-group">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cogs"></i><span class="caret"></span></button>
                  <ul class="dropdown-menu" role="menu">
                    <?php if(in_array($_SESSION['level'], array('1','3'))) : ?>
                      <li><a href="<?php echo $base_url; ?>act_rubah_status/<?php echo $d['kode_transaksi']."-SETUJU"; ?>"><i class="fa fa-check"></i>Setujui</a></li>
                      <li><a href="?id=<?php echo $d['kode_transaksi']."-TOLAK"; ?>"><i class="fa fa-times-circle"></i> Tolak</a></li>
                      <li class="divider"></li>
                    <?php endif; ?>
                    <li><a href="<?php echo $base_url; ?>invoice/<?php echo $d['kode_transaksi']; ?>"><i class="icon-bag"></i> Invoice</a></li>
                  </ul>
                </div>

                <a href="<?php echo $base_url; ?>review/<?php echo $d['kode_transaksi']."-".$d['id_kos'] ?>" class="btn btn-warning"><i class="fa fa-star"></i></a>
              </div>
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

