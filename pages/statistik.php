

<!--start page content-->
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
           <div class="body">
            <div id="laporan" style="width: 100%"></div>
        </div>
    </div>
</div><!--col-md-6-->
<div class="col-md-6">
                <div id="pengguna" style="width: 100%"></div>
</div><!--col-md-6-->
</div><!--end row-->


<script type="text/javascript">
<?php 
   $pemesanan = mysqli_query($conn,"SELECT DATE_FORMAT(tgl_pemesanan, '%Y-%m') AS bulan, COUNT(*) AS jumlah_pemesanan FROM m_transaksi GROUP BY bulan;");
   $dataPoints = array();
           while ($row = mysqli_fetch_array($pemesanan)) {
            $dataPoints[] = array("label" => $row["bulan"], "y" => $row["jumlah_pemesanan"]);
        }
?>
var dataPoints = <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>;
var chart = new CanvasJS.Chart("laporan", {
    theme: "light2",
    animationEnabled: true,
    title: {
        text: "Penjualan Per Bulan"
    },
    axisY: {
        title: "Total Pesanan Sewa Kos"
    },
    data: [{
        type: "bar",
        dataPoints: dataPoints
    }]
});

chart.render();


<?php 
    $total_pengguna = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM m_pelanggan"));
    $total_mitra = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM m_mitra"));
?>

var chart2 = new CanvasJS.Chart("pengguna", {
    theme: "light2",
    animationEnabled: true,
    title: {
        text: "Total pengguna dan mitra"
    },
    axisY: {
        title: "Pengguna dan Mitra"
    },
    data: [{
        type: "pie",
        dataPoints: [
        {"label" : "Mitra", "y" : <?php echo $total_mitra; ?> },
        {"label" : "Pengguna", "y" : <?php echo $total_pengguna; ?> }

        ]
    }]
});

chart2.render();
</script>