<?php 
$conn = mysqli_connect('localhost', 'root', '', 'kos_dijkstra');

$query = "SELECT id, lat, lng FROM m_kos";
$result = mysqli_query($conn, $query);
$jumlah = mysqli_num_rows($result);
$isine = array();
while ($data = mysqli_fetch_array($result)) {
    $isine[] = [
        'id' => $data['id'],
        'lat' => $data['lat'],
        'lng' => $data['lng']
    ];
}

// Kaidah Dijkstra
// $vertices = array('A', 'B', 'C', 'D', 'E');
$vertices = $isine;

// var_dump($vertices);


// Fungsi untuk menghitung jarak antara dua titik berdasarkan lat dan lng
function calculateDistance($lat1, $lng1, $lat2, $lng2)
{
    // Menggunakan rumus haversine untuk menghitung jarak antara dua titik koordinat
    $earthRadius = 6371; // Radius bumi dalam kilometer

    $dLat = deg2rad($lat2 - $lat1);
    $dLng = deg2rad($lng2 - $lng1);

    $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLng / 2) * sin($dLng / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    $distance = $earthRadius * $c; // Jarak dalam kilometer

    return $distance;
}


// Atau, jika Anda ingin membangun edges secara otomatis berdasarkan vertices
$edges = array();
$verticesCount = $jumlah;

for ($i = 0; $i < $verticesCount; $i++) {
    for ($j = $i + 1; $j < $verticesCount; $j++) {
        $source = $vertices[$i]['id'];
        $destination = $vertices[$j]['id'];
        $distance = calculateDistance($vertices[$i]['lat'], $vertices[$i]['lng'], $vertices[$j]['lat'], $vertices[$j]['lng']); // Atau bobot yang Anda tentukan

         $edges[] = [
            'source' =>$source,
            'target' =>$destination,
            'jarak' => $distance
         ];
        // $edges[] = array($destination, $source, $weight); // Jika graf tidak berarah, tambahkan juga edge sebaliknya
     }
 }

// Cetak array edges
 foreach ($edges as $edge) {
       $sql = "INSERT INTO m_graph (node_1,node_2, jarak) VALUES ('".$edge['source']."','".$edge['target']."','".ceil($edge['jarak'])."');";
       echo  $sql;
    $t = mysqli_query($conn, $sql);
}
