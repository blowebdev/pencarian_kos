<?php 
error_reporting(0);
session_start();
include '../config/koneksi.php';

$node_1 = $_REQUEST['node_1'];
$node_2 = $_REQUEST['node_2'];

$sql_node1 = "SELECT * FROM m_kos WHERE id='".$node_1."'";
$sql_tot_node1 = mysqli_query($conn,$sql_node1);
$data_node1 = mysqli_fetch_array($sql_tot_node1);

$sql_node2 = "SELECT * FROM m_kos WHERE id='".$node_2."'";
$sql_tot_node2 = mysqli_query($conn,$sql_node2);
$data_node2 = mysqli_fetch_array($sql_tot_node2);


function hitungJarak($lat1, $lon1, $lat2, $lon2) {
    $r = 6371; // Radius Bumi dalam kilometer

    $dlat = deg2rad($lat2 - $lat1);
    $dlon = deg2rad($lon2 - $lon1);

    $a = sin($dlat / 2) * sin($dlat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dlon / 2) * sin($dlon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    $jarak = $r * $c; // Jarak dalam kilometer
    return $jarak;
}


echo number_format(hitungJarak($data_node1['lat'], $data_node1['lng'], $data_node2['lat'], $data_node2['lng']),2);
?>