<?php

// Fungsi untuk menghitung jarak antara dua titik koordinat menggunakan Haversine formula
function haversineDistance($lat1, $long1, $lat2, $long2)
{
    $earthRadius = 6371; // Radius bumi dalam kilometer

    $deltaLat = deg2rad($lat2 - $lat1);
    $deltaLong = deg2rad($long2 - $long1);

    $a = sin($deltaLat / 2) * sin($deltaLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($deltaLong / 2) * sin($deltaLong / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    $distance = $earthRadius * $c;

    return $distance;
}

// Fungsi untuk mencari rute terpendek dengan metode hill climbing
function findShortestRoute($start, $destinations)
{
    $currentLocation = $start;
    $route = [$currentLocation]; // Inisialisasi rute awal dengan lokasi awal
    $totalDistance = 0;

    while (!empty($destinations)) {
        $shortestDistance = PHP_INT_MAX;
        $nextLocation = null;

        // Loop melalui semua tujuan yang tersedia untuk mencari tujuan terdekat
        foreach ($destinations as $destination) {
            $distance = haversineDistance($currentLocation['lat'], $currentLocation['long'], $destination['lat'], $destination['long']);

            if ($distance < $shortestDistance) {
                $shortestDistance = $distance;
                $nextLocation = $destination;
            }
        }

        // Mengupdate lokasi saat ini dan total jarak
        $currentLocation = $nextLocation;
        $totalDistance += $shortestDistance;

        // Menghapus tujuan yang telah dikunjungi dari daftar tujuan
        $key = array_search($nextLocation, $destinations);
        unset($destinations[$key]);

        // Menambahkan lokasi saat ini ke rute
        $route[] = $nextLocation;
    }

    // Menambahkan lokasi tujuan akhir ke rute
    $route[] = $start;
    $totalDistance += haversineDistance($currentLocation['lat'], $currentLocation['long'], $start['lat'], $start['long']);

    return ['route' => $route, 'distance' => $totalDistance];
}

// Contoh penggunaan fungsi findShortestRoute
$startLocation = ['lat' => -6.200000, 'long' => 106.816666]; // Koordinat lokasi awal
$destinations = [
    ['lat' => -6.190000, 'long' => 106.820000], // Koordinat tujuan 1
    ['lat' => -6.210000, 'long' => 106.830000], // Koordinat tujuan 2
    ['lat' => -6.180000, 'long' => 106.800000], // Koordinat tujuan 3
];

$result = findShortestRoute($startLocation, $destinations);

echo "Rute terpendek: <br>";
foreach ($result['route'] as $location) {
    echo "Lat: " . $location['lat'] . ", Long: " . $location['long'] . "<br>";
}

echo "Jarak total: " . $result['distance'] . " km\n";
?>
