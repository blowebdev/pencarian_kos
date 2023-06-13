<?php

// Koordinat lat-long tujuan
$tujuan = [
    'Kos A' => ['lat' => -6.200000, 'long' => 106.816666],
    'Kos B' => ['lat' => -6.225831, 'long' => 106.800864],
    'Kos C' => ['lat' => -6.198199, 'long' => 106.807540],
    'Kos D' => ['lat' => -6.212345, 'long' => 106.822445]
];

// Menghitung jarak antara dua koordinat menggunakan rumus Haversine
function hitungJarak($lat1, $long1, $lat2, $long2) {
    $earthRadius = 6371; // Radius bumi dalam kilometer

    $deltaLat = deg2rad($lat2 - $lat1);
    $deltaLong = deg2rad($long2 - $long1);

    $a = sin($deltaLat / 2) * sin($deltaLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($deltaLong / 2) * sin($deltaLong / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    $distance = $earthRadius * $c;

    return $distance;
}

// Fungsi Hill Climbing untuk mencari rute terpendek
function cariRuteTerpendek($tujuan) {
    $ruteAwal = array_keys($tujuan); // Mengambil semua tujuan sebagai rute awal
    shuffle($ruteAwal); // Acak urutan rute awal
    
    $ruteTerpendek = $ruteAwal; // Rute terpendek awal adalah rute awal
    $jarakTerpendek = hitungJarakTujuan($ruteAwal, $tujuan); // Hitung jarak rute awal

    $iterasi = 1000; // Jumlah iterasi untuk hill climbing

    while ($iterasi > 0) {
        $ruteTetangga = $ruteTerpendek; // Inisialisasi rute tetangga dengan rute terpendek saat ini

        // Swap dua tujuan acak dalam rute tetangga
        $pos1 = rand(0, count($ruteTetangga) - 1);
        $pos2 = rand(0, count($ruteTetangga) - 1);
        $temp = $ruteTetangga[$pos1];
        $ruteTetangga[$pos1] = $ruteTetangga[$pos2];
        $ruteTetangga[$pos2] = $temp;

        $jarakTetangga = hitungJarakTujuan($ruteTetangga, $tujuan); // Hitung jarak rute tetangga

        // Perbarui rute terpendek jika rute tetangga lebih pendek
        if ($jarakTetangga < $jarakTerpendek) {
            $ruteTerpendek = $ruteTetangga;
            $jarakTerpendek = $jarakTetangga;
        }

        $iterasi--;
    }

    return $ruteTerpendek;
}


// Fungsi untuk menghitung jarak total dari sebuah rute
function hitungJarakTujuan($rute, $tujuan) {
    $jarakTotal = 0;

    for ($i = 0; $i < count($rute) - 1; $i++) {
        $tujuan1 = $tujuan[$rute[$i]];
        $tujuan2 = $tujuan[$rute[$i + 1]];
        $jarak = hitungJarak($tujuan1['lat'], $tujuan1['long'], $tujuan2['lat'], $tujuan2['long']);
        $jarakTotal += $jarak;
    }

    return $jarakTotal;
}

// Memanggil fungsi untuk mencari rute terpendek
$ruteTerpendek = cariRuteTerpendek($tujuan);

// // Menampilkan hasil rute terpendek
echo "<br><br>Rute Terpendek: " . implode(' -> ', $ruteTerpendek) . "\n";
echo "Jarak Terpendek: " . hitungJarakTujuan($ruteTerpendek, $tujuan) . " km\n";

?>
