<?php 

if (isset($_REQUEST['simpan'])) {
	$id_pelanggan = $_SESSION['user_detail']['id'];
	$nama = $_REQUEST['nama'];
	$kode_transaksi = $_REQUEST['kode_transaksi'];
	$hp = hp($_REQUEST['hp']);
	$tgl_kunjung = $_REQUEST['tgl_berkunjung'];
	$total_bulan = $_REQUEST['total'];
	$grand_total = $_REQUEST['grand_total'];


	$save_sql = "
	INSERT INTO `m_transaksi`(
	`id_pelanggan`,
	`id_kos`,
	`kode_transaksi`,
	`tgl_pemesanan`,
	`tgl_kunjung`,
	`keterangan`,
	`harga`,
	`total_bulan`, `nama`, `hp`, `grand_total`, `status` ) VALUES (
	'".$id_pelanggan."',
	'".$_REQUEST['id']."',
	'".$kode_transaksi."',
	'".date('Y-m-d')."',
	'".$tgl_kunjung."',
	'".$_REQUEST['keterangan']."',
	'".$_REQUEST['harga_bulan']."',
	'".$total_bulan."',
	'".$_REQUEST['nama']."',
	'".$_REQUEST['hp']."',
	'".$total_bulan*$_REQUEST['harga_bulan']."',
	'PROSES'
	)
	";
	$simpan = mysqli_query($conn,$save_sql);
	if ($simpan) {
		$isine ="
		Terimakasih atas pemesananya penyewaan dengan detail dibawah ini \nDitunggu pemesanan kembali \n Happy kos 😀";

		$data = array(
			'chatId'      => $hp.'@c.us',
			'message'    => $isine,
		);
		$options = array(
			'http' => array(
				'method'  => 'POST',
				'content' => json_encode( $data ),
				'header'=>  "Content-Type: application/json\r\n" .
				"Accept: application/json\r\n"
			)
		);
		$url = "https://ru-api.basis-api.com/waInstance1101000819/sendMessage/8c7b8d6b26d891250cb882937249d2aa5cb3c5c15da36079";
		$context  = stream_context_create( $options );
		$result = file_get_contents( $url, false, $context );
		$response = json_decode( $result);

		echo '
		<div class="alert alert-success alert-dismissible" role="alert">
		<div class="alert-message">
		<strong>Redirect........</strong>
		</div>
		</div>
		<meta http-equiv="refresh" content="1; url='.$base_url.'invoice/'.$_REQUEST['kode_transaksi'].'">
		';
	}else{
		echo "Error : mohon periksa kembali";
	}
}
?>