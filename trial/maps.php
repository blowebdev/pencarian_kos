<!DOCTYPE html>
<html>
<head>
    <title>Google Maps Direction</title>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="map"></div>

    <script>
        // Inisialisasi peta
        function initMap() {
            var directionsService = new google.maps.DirectionsService();
            var directionsDisplay = new google.maps.DirectionsRenderer();
            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                center: {lat: -6.1751, lng: 106.8650} // Koordinat awal peta
            });


            directionsDisplay.setMap(map);

            // Menampilkan rute arah antara dua penanda (marker)
            calculateAndDisplayRoute(directionsService, directionsDisplay);
        }

        // Menghitung dan menampilkan rute arah
        function calculateAndDisplayRoute(directionsService, directionsDisplay) {
            var start = new google.maps.LatLng(-6.2088, 106.8456); // Koordinat awal
            var end = new google.maps.LatLng(-6.1751, 106.8650); // Koordinat akhir

            // Konfigurasi rute arah
            var request = {
                origin: start,
                destination: end,
                travelMode: google.maps.TravelMode.DRIVING
            };

            // Mengirim permintaan rute arah ke Directions Service
            directionsService.route(request, function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);

                    // Mendapatkan langkah-langkah rute arah
                    var steps = response.routes[0].legs[0].steps;

                    // Menampilkan ikon bergerak di antara dua penanda (marker)
                    animateMarker(steps);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
        }

        // Menampilkan ikon bergerak di antara dua penanda (marker)
        function animateMarker(steps) {
            var marker = new google.maps.Marker({
                position: steps[0].start_point,
                map: map,
                icon: 'https://maps.google.com/mapfiles/kml/paddle/go.png' // URL ikon
            });

            var stepIndex = 0;
            var numSteps = steps.length;

            // Fungsi rekursif untuk menggerakkan ikon ke setiap langkah
            function moveMarker() {
                if (stepIndex >= numSteps) {
                    return;
                }

                var step = steps[stepIndex];
                var duration = step.duration.value * 1000; // Durasi dalam milidetik
                var delay = 1000; // Waktu tunda sebelum memulai langkah berikutnya (dalam milidetik)

                setTimeout(function() {
                    marker.setPosition(step.end_point);
                    stepIndex++;
                    moveMarker();
                }, duration + delay);
            }

            moveMarker();
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTgPmRwGjuwyazUzzZl6CosQTw1qpUDtY&callback=initMap" async defer></script>
</body>
</html>
