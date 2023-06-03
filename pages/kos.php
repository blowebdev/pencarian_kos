<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary collapsed">
            <div class="panel-body">
                <table id="datatable" class="table table-striped dt-responsive nowrap">
                    <thead class="bg-primary">
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Mitra</th>
                            <th>Nama</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                     <?php 
                     $no=1;
                     $q = mysqli_query($conn,"SELECT a.*, b.nama as mitra FROM m_kos as a 
                        LEFT JOIN m_mitra as b ON a.id_mitra = b.id");
                     while ($d = mysqli_fetch_array($q)) :
                         ?>

                         <tr>
                             <td width="1%"><?php echo $no++; ?></td>
                             <td>
                             	<img src="<?php echo $base_url; ?>upload/<?php echo $d['gambar']; ?>">
                             </td>
                             <td><?php echo $d['mitra']; ?></td>
                             <td><?php echo $d['nama']; ?></td>
                             <td><?php echo $d['lat']; ?></td>
                             <td><?php echo $d['lng']; ?></td>
                             <td><?php echo $d['alamat']; ?></td>
                             <td nowrap="">
                                 <form action="" method="POST">
                                     <button type="submit" name="pesan" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart "></i> Pesan</button>
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

