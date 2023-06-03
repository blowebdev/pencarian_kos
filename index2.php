<?php

function distance($lat1, $lon1, $lat2, $lon2)
{
    $radius = 6371; // Radius bumi dalam kilometer

    $dlat = deg2rad($lat2 - $lat1);
    $dlon = deg2rad($lon2 - $lon1);

    $a = sin($dlat / 2) * sin($dlat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dlon / 2) * sin($dlon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    $distance = $radius * $c;

    return $distance;
}

function findShortestRoute($locations)
{
    // Menentukan titik awal
    $currentLocation = $locations[0];
    $route = [$currentLocation];

    // Melakukan hill climbing
    while (count($route) < count($locations)) {
        $shortestDistance = PHP_INT_MAX;
        $bestLocation = null;

        foreach ($locations as $location) {
            if (!in_array($location, $route)) {
                $distance = distance($currentLocation['lat'], $currentLocation['long'], $location['lat'], $location['long']);
                if ($distance < $shortestDistance) {
                    $shortestDistance = $distance;
                    $bestLocation = $location;
                }
            }
        }

        if ($bestLocation !== null) {
            $route[] = $bestLocation;
            $currentLocation = $bestLocation;
        } else {
            break; // Tidak ada rute yang tersisa
        }
    }

    return $route;
}

// Contoh data lokasi kos dengan latitude dan longitude
$locations = [
    ['name' => 'Kos A', 'lat' => -6.200, 'long' => 106.800],
    ['name' => 'Kos B', 'lat' => -6.150, 'long' => 106.850],
    ['name' => 'Kos C', 'lat' => -6.175, 'long' => 106.900],
    ['name' => 'Kos D', 'lat' => -6.225, 'long' => 106.825],
    ['name' => 'Kos E', 'lat' => -6.250, 'long' => 106.875]
];

// Mencari rute terpendek menggunakan metode Hill Climbing
$route = findShortestRoute($locations);

// Menampilkan rute terpendek
echo "Rute Terpendek:\n";
foreach ($route as $location) {
    echo $location['name'] . " (" . $location['lat'] . ", " . $location['long'] . ")\n";
}
?>
