<!DOCTYPE html>
<html>
<head>
    <title>Rute Kos dengan Dijkstra</title>
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
        // Data graf untuk kos
        <?php
        include "../config/koneksi.php";
        $arr_graph = "";
        $query = mysqli_query($conn,"SELECT * FROM m_kos");
        while ($data = mysqli_fetch_array($query)) {
            $bantu2 = "";
            $query2 = mysqli_query($conn,"SELECT * FROM m_graph WHERE node_1 = '".$data['id']."' ORDER BY node_2 ASC");
            while ($data2 = mysqli_fetch_array($query2)) {
                $bantu2 .= "'".$data2['node_2']."': ".$data2['jarak'].",";
            }
            if(!empty($bantu2)){
                $arr_graph.="'".$data['id']."' : {".substr($bantu2, 0, -1)."},";
            }else{

            }
        }

        var_dump($arr_graph);

        $kosbantu = "";
        $DataKos = mysqli_query($conn,"SELECT * FROM m_kos order by kode asc");
        while ($dakos = mysqli_fetch_array($DataKos)) {
            $kosbantu .="'".$dakos['id']."': {'nama': '<b> (".$dakos['kode'].") </b> ".$dakos['nama']."', 'lat' : ".$dakos['lat'].", 'lng' : ".$dakos['lng']." },";
        }
        ?>
        // var graph = {
        //     A: { B: 2, C: 4 },
        //     B: { A: 2, C: 1, D: 5 },
        //     C: { A: 4, B: 1, D: 3 },
        //     D: { B: 5, C: 3 }
        // };
        // var graph ={<?php echo substr($arr_graph, 0, -1); ?>};

        var cd = {<?php echo substr($arr_graph, 0, -1); ?>};

        // Data marker dan popup kos
        // var kosData = {
        //     A: { lat: -6.200000, lng: 106.816666, nama: "Kos A" },
        //     B: { lat: -6.201389, lng: 106.852222, nama: "Kos B" },
        //     C: { lat: -6.226944, lng: 106.801389, nama: "Kos C" },
        //     D: { lat: -6.217500, lng: 106.803056, nama: "Kos D" }
        // };

         var kosData = {<?php echo substr($kosbantu, 0, -1); ?>};

        // Inisialisasi peta Google Maps
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: -7.5606744, lng: 111.9295565 },
                zoom: 10
            });

            // Menambahkan marker dan popup kos ke peta
            for (var key in kosData) {
                var marker = new google.maps.Marker({
                    position: { lat: kosData[key].lat, lng: kosData[key].lng },
                    map: map,
                    title: kosData[key].nama
                });

                var infowindow = new google.maps.InfoWindow({
                    content: kosData[key].nama
                });

                marker.addListener('click', function () {
                    infowindow.open(map, this);
                });
            }

            // Mengatur rute terpendek menggunakan algoritma Dijkstra
            var ruteTerpendek = dijkstra(graph, 'A', 'D');
            console.log(ruteTerpendek); // Cetak rute terpendek ke konsol

            // Menampilkan rute terpendek pada peta
            var pathCoordinates = [];
            for (var i = 0; i < ruteTerpendek.length; i++) {
                pathCoordinates.push({
                    lat: kosData[ruteTerpendek[i]].lat,
                    lng: kosData[ruteTerpendek[i]].lng
                });
            }

            var path = new google.maps.Polyline({
                path: pathCoordinates,
                geodesic: true,
                strokeColor: '#FF0000',
                strokeOpacity: 1.0,
                strokeWeight: 2
            });

            path.setMap(map);
        }

        // Algoritma Dijkstra untuk mencari rute terpendek
        function dijkstra(graph, start, end) {
            var nodes = {};
            var distances = {};
            var previous = {};
            var path = [];

            for (var node in graph) {
                distances[node] = Infinity;
                previous[node] = null;
                nodes[node] = graph[node];
            }

            distances[start] = 0;

            while (Object.keys(nodes).length !== 0) {
                var minDistanceNode = null;

                for (var node in nodes) {
                    if (minDistanceNode === null || distances[node] < distances[minDistanceNode]) {
                        minDistanceNode = node;
                    }
                }

                if (minDistanceNode === end) {
                    break;
                }

                for (var neighbor in graph[minDistanceNode]) {
                    var alt = distances[minDistanceNode] + graph[minDistanceNode][neighbor];
                    if (alt < distances[neighbor]) {
                        distances[neighbor] = alt;
                        previous[neighbor] = minDistanceNode;
                    }
                }

                delete nodes[minDistanceNode];
            }

            var currentNode = end;

            while (currentNode !== null) {
                path.unshift(currentNode);
                currentNode = previous[currentNode];
            }

            return path;
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTgPmRwGjuwyazUzzZl6CosQTw1qpUDtY&callback=initMap" async defer></script>
</body>
</html>
