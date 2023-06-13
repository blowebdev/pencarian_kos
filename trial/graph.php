<?php
// Koneksi ke database MySQL
$conn = mysqli_connect('localhost', 'root', '', 'kos_dijkstra');

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

// Fungsi untuk mengambil informasi edges (sisi) dari database berdasarkan lat dan lng
function getEdges()
{
    global $conn;
    $edges = array();

    $query = "SELECT id, lat, lng FROM m_kos";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $edges[] = array(
            'id' => $row['id'],
            'lat' => $row['lat'],
            'lng' => $row['lng']
        );
    }

    return $edges;
}

// Fungsi untuk membuat graph dari informasi edges berdasarkan lat dan lng
function createGraph()
{
    $edges = getEdges();
    $graph = array();

    foreach ($edges as $source) {
        foreach ($edges as $target) {
            if ($source['id'] !== $target['id']) {
                $distance = calculateDistance($source['lat'], $source['lng'], $target['lat'], $target['lng']);

                $graph[] = array(
                    'source' => $source['id'],
                    'target' => $target['id'],
                    'jarak' => $distance
                );
            }
        }
    }

    return $graph;
}

// Contoh penggunaan fungsi createGraph
$graph = createGraph();

// Menampilkan informasi graph
foreach ($graph as $edge) {
    echo 'Source: ' . $edge['source'] . ', Target: ' . $edge['target'] . ', jarak: ' . $edge['jarak'] .' jarak bulat: ' . ceil($edge['jarak']). '<br>';

     $sql = "INSERT INTO m_graph (node_1,node_2, jarak) VALUES ('".$edge['source']."','".$edge['target']."','".ceil($edge['jarak'])."');";
    // $t = mysqli_query($conn, $sql);
}

// Tutup koneksi ke database MySQL
mysqli_close($conn);
?>
