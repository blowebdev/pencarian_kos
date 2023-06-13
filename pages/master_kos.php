  <?php 
  if (isset($_REQUEST['hapus'])) {
    $sql = "DELETE FROM m_kos WHERE id='".$_REQUEST['id']."'";
    $exc = mysqli_query($conn,$sql);
    if ($exc) {
        echo '
        <div class="alert alert-success alert-dismissible" role="alert">
        <div class="alert-message">
        <strong>Perhatian !! Data berhasil dihapus</strong>
        </div>
        </div>

        <meta http-equiv="refresh" content="1">

        ';
    }else{
        echo '
        <div class="alert alert-danger alert-dismissible" role="alert">
        <div class="alert-message">
        <strong>Perhatian !! Data gagal dihapus</strong>
        </div>
        </div>


        ';
    }
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary collapsed">
            <div class="panel-heading">
                Master data Kos / Vertex
            </div>
            <div class="panel-body">
                <a href="<?php echo $base_url; ?>add_kos" class="btn btn-danger"><i class="fa fa-plus"></i> Tambah Vertex</a> 
                <br>
                <br>
                <table id="datatable" class="table table-striped dt-responsive nowrap">
                    <thead class="bg-primary">
                        <tr>
                            <th>#</th>
                            <th>Kode Vertex</th>
                            <th>Mitra</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                     <?php 
                     $no=1;
                     if ($_SESSION['level']==1) {
                        $filter = "";
                     }elseif ($_SESSION['level']==3) {
                        $filter = "WHERE a.id_mitra='".$_SESSION['id_mitra']."'";
                     }
                     $q = mysqli_query($conn,"SELECT a.*, b.nama as mitra FROM m_kos as a 
                        LEFT JOIN m_mitra as b ON a.id_mitra = b.id
                        ".$filter."
                        ");
                     while ($d = mysqli_fetch_array($q)) :
                         ?>

                         <tr>
                             <td width="1%"><?php echo $no++; ?></td>
                             <td><?php echo $d['kode']; ?></td>
                             <td><?php echo $d['mitra']; ?></td>
                             <td><?php echo $d['nama']; ?></td>
                             <td><?php echo $d['harga']; ?></td>
                             <td><?php echo $d['lat']; ?></td>
                             <td><?php echo $d['lng']; ?></td>
                             <td><?php echo $d['alamat']; ?></td>
                             <td nowrap="">

                                 <form action="" method="POST">
                                     <a href="<?php echo $base_url; ?>add_kos/<?php echo $d['id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                     <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                     <button type="submit" name="hapus" onclick="return confirm('Apakah anda ingin menghapus data ini ?');" class="btn btn-danger btn-sm"><i class="fa fa-trash "></i></button>
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

