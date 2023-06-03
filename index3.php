<?php

function calculateDistance($lat1, $lon1, $lat2, $lon2) {
    $earthRadius = 6371; // radius bumi dalam kilometer

    $dLat = deg2rad($lat2 - $lat1);
    $dLon = deg2rad($lon2 - $lon1);

    $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $distance = $earthRadius * $c;

    return $distance;
}

function hillClimbingSearch($start, $destinations) {
    $currentLocation = $start;
    $route = [$currentLocation]; // jalur yang dilalui
    $visited = [$currentLocation]; // lokasi yang sudah dikunjungi

    while (count($visited) < count($destinations)) {
        $shortestDistance = PHP_INT_MAX;
        $nextLocation = '';

        foreach ($destinations as $location) {
            if (!in_array($location, $visited)) {
                $distance = calculateDistance($currentLocation['lat'], $currentLocation['long'], $location['lat'], $location['long']);
                if ($distance < $shortestDistance) {
                    $shortestDistance = $distance;
                    $nextLocation = $location;
                }
            }
        }

        if ($nextLocation == '') {
            break; // tidak ada lokasi yang tersisa
        }

        $route[] = $nextLocation;
        $visited[] = $nextLocation;
        $currentLocation = $nextLocation;
    }

    return $route;
}


// Contoh data lokasi
$start = ['name' => 'Lokasi Awal', 'lat' => -7.52884648105221, 'long' => 112.23491280052839]; // Koordinat lat-long lokasi awal

$destinations = [
    ['name' => 'Kos 1', 'lat' => -7.483916245632679, 'long' => 112.3064955925409],
    ['name' => 'Kos 2', 'lat' => -7.534802792076237, 'long' => 112.25619881062323],
    ['name' => 'Kos 3', 'lat' => -7.516082681934391, 'long' => 112.28881447125244],
    ['name' => 'Kos 4', 'lat' => -7.518295100677282, 'long' => 112.23886101207823]
];

$route = hillClimbingSearch($start, $destinations);

// Menampilkan hasil rute terpendek
echo "Rute Terpendek:<br>";
foreach ($route as $location) {
    echo $location['name'] . " (Lat: " . $location['lat'] . ", Long: " . $location['long'] . ") Jarak = ".calculateDistance('-7.52884648105221', '112.23491280052839', $location['lat'], $location['long'])." Km<br>";
}


?>
<br>
<br>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<table border="1px">
    <tr>
        <td>Nama</td>
        <td>Jarak Km</td>
    </tr>
    <?php foreach ($destinations as $key => $location):?>
    <tr>
        <td><?php echo $location['name']; ?></td>
        <td><?php echo calculateDistance('-7.52884648105221', '112.23491280052839', $location['lat'], $location['long']) ; ?>Km</td>
    </tr>
<?php endforeach;?>
</table>
</body>
</html>