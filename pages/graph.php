  <?php 
  if (isset($_REQUEST['hapus'])) {

     
    $sql = "DELETE FROM m_graph WHERE id='".$_REQUEST['id']."'";
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
              Graph Djistra
          </div>
          <div class="panel-body">
            <a href="add_graph" class="btn btn-danger">Tambah Graph</a>
            <br>
            <br>
            <table id="datatable" class="table table-striped dt-responsive nowrap">
                <thead class="bg-primary">
                    <tr>
                        <th width="1%">#</th>
                        <th>Kode</th>
                        <th>Tujuan Awal</th>
                        <th>Kode</th>
                        <th>Tujuan Akhir</th>
                        <th>Jarak (Km)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                 <?php 
                 $no=1;
                 $q = mysqli_query($conn,"SELECT a.id, b.kode as kode_node_1, b.nama as node_1, c.kode as kode_node_2, c.nama as node_2, a.jarak FROM m_graph as a 
                    LEFT JOIN m_kos as b ON a.node_1 = b.id
                    LEFT JOIN m_kos as c ON a.node_2 = c.id");
                 while ($d = mysqli_fetch_array($q)) :
                     ?>

                     <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['kode_node_1']; ?></td>
                        <td><?php echo $d['node_1']; ?></td>
                        <td><?php echo $d['kode_node_2']; ?></td>
                        <td><?php echo $d['node_2']; ?></td>
                        <td><?php echo $d['jarak']; ?></td>
                        <td nowrap="">
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                <button class="btn btn-sm btn-danger" type="submit" name="hapus" onclick="return confirm('Apakah anda yakin ?');"><i class="fa fa-trash"></i></button>
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

