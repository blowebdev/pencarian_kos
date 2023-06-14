<a href="kos" class="btn btn-danger">Kembali</a>
Direction rute terdekat 
<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>

<?php 
$lat = $_REQUEST['lat'];
$lng = $_REQUEST['lng'];
$q = mysqli_query($conn,"
    SELECT v.* FROM (
    SELECT a.*, b.nama as mitra,

    (
    6371 * ACOS(
    COS(RADIANS(".$lat.")) * COS(RADIANS(a.lat)) * COS(RADIANS(".$lng.") - RADIANS(a.lng)) + SIN(RADIANS(".$lat.")) * SIN(RADIANS(a.lat))
    )
    ) AS distance
    FROM m_kos as a 
    LEFT JOIN m_mitra as b ON a.id_mitra = b.id
    ) AS v ORDER BY v.distance ASC
    ");

$damarker = array();
while ($marker = mysqli_fetch_array($q)) {
    $damarker[] = [
        'lat' => $marker['lat'],
        'lng' => $marker['lng'],
        'label' => $marker['nama']
    ];
}

$mark = json_encode($damarker);
    ?>
    <div id="map"></div>


    <script>
        var directionsService;
        var directionsDisplay;
        var map;

        function initMap() {
            directionsService = new google.maps.DirectionsService();
            directionsDisplay = new google.maps.DirectionsRenderer();
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -7.561479, lng: 112.2592315},
                zoom: 5
            });
            directionsDisplay.setMap(map);


            // Array of markers
            var markers = <?php echo $mark; ?>; 

            // Add markers to the map
            for (var i = 0; i < markers.length; i++) {
                var marker = new google.maps.Marker({
                    position: {lat: markers[i].lat, lng: markers[i].lng},
                    map: map,
                    label: markers[i].label
                });
            }

            // Calculate and display directions
            calculateAndDisplayRoute();
        }

        function calculateAndDisplayRoute() {
            var waypoints = [];
            var markers = <?php echo $mark; ?>;

            // Add waypoints for markers (excluding the first and last markers)
            for (var i = 1; i < markers.length - 1; i++) {
                waypoints.push({
                    location: new google.maps.LatLng(markers[i].lat, markers[i].lng),
                    stopover: true
                });
            }

            // Configure the directions request
            var request = {
                origin: new google.maps.LatLng(markers[0].lat, markers[0].lng),
                destination: new google.maps.LatLng(markers[markers.length - 1].lat, markers[markers.length - 1].lng),
                waypoints: waypoints,
                travelMode: 'DRIVING'
            };

            // Call the directions service to calculate the route
            directionsService.route(request, function(response, status) {
                if (status === 'OK') {
                    // Display the route on the map
                    directionsDisplay.setDirections(response);
                } else {
                    console.log('Directions request failed due to ' + status);
                }
            });
        }

        google.maps.event.addDomListener(window, 'load', initMap);
    </script>

