
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
				Deskripsi Kos dan review
			</div>
			<div class="panel-body">
				<?php echo $detail_kos['deskripsi']; ?>
			</div>
		</div>
	</div>
</div>



<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success collapsed">
			<div class="panel-heading">
				Review Pelanggan
			</div>
			<div class="panel-body">
				<?php 
				$res = mysqli_query($conn,"SELECT (a.lokasi/5+a.jarak/5+a.pesan_mudah/5+a.aplikasi/5+a.ui/5) as tot , a.catatan, b.nama FROM `m_review` as a 
					LEFT JOIN m_pelanggan as b ON a.id_user = b.id
				 WHERE a.id_kos='".$_REQUEST['id']."'");
				while($total = mysqli_fetch_array($res)) :
					echo "<b><i class='fa fa-user'></i> ".$total['nama']."</b><br>";
					for ($i=1; $i <=$total['tot'] ; $i++) { 
						echo "<i class='fa fa-star-o' style='color:yellow'></i>";
					}echo "<b> (".number_format($total['tot'],1).")</b>";
					echo "<br>Pelanggan : <i>".$total['catatan']."</i><b>";
					echo "<hr>";
				endwhile; ?>
				<center><a href="<?php echo $base_url; ?>pemesanan/<?php echo $detail_kos['id']; ?>" class="btn btn-lg btn-primary">Pesan Sekarang</a></center>
			</div>
		</div>
	</div>
</div>