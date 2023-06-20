<?php if (isset($_REQUEST['simpan'])) {
    $node_1 = $_REQUEST['node_1'];
    $node_2 = $_REQUEST['node_2'];
    $jarak = $_REQUEST['jarak'];

    $cek_datane = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM m_graph WHERE node_1 = ".$_REQUEST['node_1']." AND  node_2='".$_REQUEST['node_2']."'"));
    if ($cek_datane<=0) {
        $sql = "INSERT INTO `m_graph`(`node_1`, `node_2`, `jarak`) VALUES ('".$node_1."','".$node_2."','".$jarak."')";
        $exc = mysqli_query($conn,$sql);
        if ($exc) {
            echo '
            <div class="alert alert-success alert-dismissible" role="alert">
            <div class="alert-message">
            <strong>Perhatian !! Data berhasil disimpan</strong>
            </div>
            </div>
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
    }else{
       echo '
       <div class="alert alert-danger alert-dismissible" role="alert">
       <div class="alert-message">
       <strong>Perhatian !! Data sudah pernah diinput</strong>
       </div>
       </div>


       ';
   }
}?>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-teal">
            <div class="panel-heading">
                Tambah Graph
            </div>
            <div class="panel-body">
                <form method="POST" action="" class="form-horizontal" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Node 1</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="node_1" required="" id="node_1">
                                    <option value="">Pilih Node 1</option>
                                    <?php 
                                    $pengguna = mysqli_query($conn,"SELECT * FROM m_kos ORDER BY kode ASC");
                                    foreach ($pengguna as $key => $damit):
                                        ?>

                                        <option value="<?php echo $damit['id']; ?>" 
                                            <?php echo ($datane['id_mitra']==$damit['id']) ? "selected": ""; ?>
                                            ><?php echo " ".$damit['kode']."- ".$damit['nama']; ?></option>
                                            <?php endforeach; ?>X
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Node 2</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="node_2"  required="" id="node_2" onchange="check_jarak()">
                                            <option value="">Pilih Node 2</option>
                                            <?php 
                                            $pengguna = mysqli_query($conn,"SELECT * FROM m_kos ORDER BY kode ASC");
                                            foreach ($pengguna as $key => $damit):
                                                ?>

                                                <option value="<?php echo $damit['id']; ?>" 
                                                    <?php echo ($datane['id_mitra']==$damit['id']) ? "selected": ""; ?>
                                                    ><?php echo " ".$damit['kode']."- ".$damit['nama']; ?></option>
                                                    <?php endforeach; ?>X
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Jarak</label>
                                            <div class="col-sm-2">
                                                <input type="text" name="jarak" placeholder="Jarak" id="jarak">
                                            </div> <label style="font-weight: bold;">Km</label>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                                <a href="<?php echo $base_url; ?>graph" class="btn btn-danger">Kembali</a>
                                                <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function check_jarak() {
                var node_1 = $("#node_1").val();
                var node_2 = $("#node_2").val();
                $.ajax({
                    url: '<?php echo $base_url; ?>pages/cek_jarak.php',
                    type: 'POST',
                    dataType: 'html',   
                    data: {node_1: node_1, node_2 : node_2},
                    success : function(data) {

                        $("#jarak").val(data);
                    }
                });
            }
        </script>