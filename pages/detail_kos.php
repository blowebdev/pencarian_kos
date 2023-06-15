
<?php 
	$detail_kos_res = mysqli_query($conn,"SELECT * FROM m_kos WHERE id='".$_REQUEST['id']."'");
	$detail_kos = mysqli_fetch_array($detail_kos_res);
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success collapsed">
            <div class="panel-body">
            	<div class="row">
            		 <div class="col-md-3">
            		 	<img class="rounded border float-left"  height="200" width="200" src="<?php echo $base_url; ?>/upload/<?php echo $detail_kos['gambar']; ?>">
            		 	<center style="font-weight: bold; text-decoration: underline;">Gambar 1</center>
            		 </div>
            		 <div class="col-md-3">
            		 	<img class="rounded border float-left"  height="200" width="200" src="<?php echo $base_url; ?>/upload/<?php echo $detail_kos['gambar2']; ?>">
            		 	<center style="font-weight: bold; text-decoration: underline;">Gambar 2</center>
            		 </div>
            		 <div class="col-md-3">
            		 	<img class="rounded border float-left" height="200" width="200" src="<?php echo $base_url; ?>/upload/<?php echo $detail_kos['gambar3']; ?>">
            		 	<center style="font-weight: bold; text-decoration: underline;">Gambar 3</center>
            		 </div>
            	</div>
            </div>
        </div>
    </div>
   </div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success collapsed">
            <div class="panel-heading">
            	Deskripsi
            </div>
            <div class="panel-body">
            	<?php echo $detail_kos['deskripsi']; ?>


            	<center><a href="<?php echo $base_url; ?>pemesanan/<?php echo $detail_kos['id']; ?>" class="btn btn-lg btn-primary">Pesan Sekarang</a></center>
            </div>
        </div>
    </div>
   </div>