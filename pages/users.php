  <?php 
  if (isset($_REQUEST['hapus'])) {
    $sql = "DELETE FROM ".$_REQUEST['table']." WHERE id='".$_REQUEST['id']."'";
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
        <div class="panel panel-success collapsed">
            <div class="panel-heading">
                Master data Pengguna
            </div>
            <div class="panel-body">
                <a href="<?php echo $base_url; ?>register" class="btn btn-danger"><i class="fa fa-plus"></i> Tambah User</a> 
                <br>
                <br>
                <table id="datatable" class="table table-striped dt-responsive nowrap">
                    <thead class="bg-success">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Hp</th>
                            <th>Alamat</th>
                            <th>Level</th>
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
                    $q = mysqli_query($conn,"
                        SELECT 'm_mitra' as tb, 'mitra' as level, nama, hp, username, email, id, alamat   FROM `m_mitra` 
                        UNION 
                        SELECT 'm_pelanggan' as tb, 'pelanggan' as level, nama, hp, username, email, id , alamat  FROM `m_pelanggan` 
                        ");
                    while ($d = mysqli_fetch_array($q)) :
                       ?>

                       <tr>
                           <td width="1%"><?php echo $no++; ?></td>
                           <td><?php echo $d['nama']; ?></td>
                           <td><?php echo $d['email']; ?></td>
                           <td><?php echo $d['hp']; ?></td>
                           <td><?php echo $d['alamat']; ?></td>
                           <td><?php echo $d['level']; ?></td>
                           <td nowrap="">

                               <form action="" method="POST">
                                   <a href="<?php echo $base_url; ?>register/<?php echo $d['id']; ?>/<?php echo $d['level']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                   <input type="hidden" name="table" value="<?php echo $d['tb']; ?>">
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

