<!DOCTYPE html>
<html>
<head>
    <title>Pencarian Rute Kos</title>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h2>Pencarian Rute Kos</h2>
    <div id="map"></div>

    <script>
        function initMap() {
            // Posisi awal dan akhir
            var start = { lat: -6.200000, lng: 106.816666 }; // Ubah sesuai koordinat lat-long titik awal
            var end = { lat: -6.227778, lng: 106.804722 }; // Ubah sesuai koordinat lat-long titik tujuan

            // Buat peta Google Maps
            var map = new google.maps.Map(document.getElementById('map'), {
                center: start,
                zoom: 14
            });

            // Tambahkan penanda untuk titik awal dan akhir
            var markerStart = new google.maps.Marker({
                position: start,
                map: map,
                title: 'Titik Awal'
            });

            var markerEnd = new google.maps.Marker({
                position: end,
                map: map,
                title: 'Titik Tujuan'
            });

            // Buat objek DirectionsService dan DirectionsRenderer
            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer();
            directionsRenderer.setMap(map);

            // Mencari rute menggunakan Algoritma Dijkstra
            var request = {
                origin: start,
                destination: end,
                travelMode: 'WALKING'
            };

            directionsService.route(request, function (result, status) {
                if (status == 'OK') {
                    directionsRenderer.setDirections(result);
                }
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTgPmRwGjuwyazUzzZl6CosQTw1qpUDtY&callback=initMap" async defer></script>
</body>
</html>
