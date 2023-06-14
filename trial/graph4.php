<?php
$host = 'localhost';
$dbname = 'kos_dijkstra';
$username = 'root';
$password = '';

// Menghubungkan ke database menggunakan PDO
try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

// Mengambil data lokasi dari database
$query = "SELECT id, lat, `lng` FROM m_kos";
$stmt = $dbh->prepare($query);
$stmt->execute();
$lokasi = $stmt->fetchAll(PDO::FETCH_ASSOC);

function haversineDistance($lat1, $lon1, $lat2, $lon2)
{
    $earthRadius = 6371; // Radius bumi dalam kilometer

    $deltaLat = deg2rad($lat2 - $lat1);
    $deltaLon = deg2rad($lon2 - $lon1);

    $a = sin($deltaLat / 2) * sin($deltaLat / 2) +
        cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
        sin($deltaLon / 2) * sin($deltaLon / 2);

    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    $distance = $earthRadius * $c;

    return $distance;
}

$n = count($lokasi); // Jumlah lokasi

// Inisialisasi array dengan urutan otomatis
$urutan = array();

// Menghitung jarak antara setiap pasangan lokasi dan memasukkan ke dalam array
for ($i = 0; $i < $n; $i++) {
    for ($j = $i + 1; $j < $n; $j++) {
        $jarak = haversineDistance($lokasi[$i]['lat'], $lokasi[$i]['lng'], $lokasi[$j]['lat'], $lokasi[$j]['lng']);

        // Memasukkan pasangan lokasi dan jarak ke dalam array
        $urutan[] = array($lokasi[$i]['id'], $lokasi[$j]['id'], $jarak);
    }
}

foreach ($urutan as $key=>$data) {
	var_dump($data);
}
?>

