<?php 
$id = explode("-", $_REQUEST['id']);
$kode_transaksi = $id[0];
$status = $id[1];

$sql = "UPDATE m_transaksi SET status='".$status."' WHERE kode_transaksi='".$kode_transaksi."'";
mysqli_query($conn,$sql);
?>

<script type="text/javascript">
	window.location = "<?php echo $base_url; ?>histori_pemesanan";
</script>