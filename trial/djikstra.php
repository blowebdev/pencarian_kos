
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
    <h1>Rute Kos</h1>
    <div id="map"></div>






    <?php 
        // $arr = array();
        $arr_graph = "";
        $query = mysqli_query($conn,"SELECT * FROM m_kos");
        while ($data = mysqli_fetch_array($query)) {
            $bantu2 = "";
            $query2 = mysqli_query($conn,"SELECT * FROM m_graph WHERE node_1 = '".$data['id']."' ORDER BY node_2 ASC");
            while ($data2 = mysqli_fetch_array($query2)) {
                $bantu2 .= "'".$data2['node_2']."': ".$data2['jarak'].",";
            }
            $arr_graph.="'".$data['id']."' : {".substr($bantu2, 0, -1)."},";
        }

        $kosbantu = "";
        $DataKos = mysqli_query($conn,"SELECT * FROM m_kos");
        while ($dakos = mysqli_fetch_array($DataKos)) {
            $kosbantu .="'".$dakos['id']."': {'nama': '".$dakos['nama']."', 'lat' : ".$dakos['lat'].", 'lng' : ".$dakos['lng']." },";
        }

    ?>

    <script>
        function initMap() {
            // Data graf berdasarkan latitude dan longitude
              //Data graf berdasarkan latitude dan longitude
            var graph = {
                '1': { '2': 5, '3': 3 },
                '2': { '1': 5, '4': 2 },
                '3': { '1': 3, '4': 1 },
                '4': { '2': 2, '3': 1, '5': 4 },
                '5': { '5': 4 }
            };



            // Data koordinat latitude dan longitude untuk setiap kos
            var kosData = {
                '1': { 'nama': 'Kos A', 'lat': -7.66658021256, 'lng': 112.29991228259985 }, //Bareng
                '2': { 'nama': 'Kos B', 'lat': -7.583162618675641, 'lng': 112.23320417178812 }, //diwek
                '3': { 'nama': 'Kos C', 'lat': -7.5301093643827794, 'lng': 112.29295089686751 }, //peterongan
                '4': { 'nama': 'Kos D', 'lat': -7.724378108463288, 'lng': 112.3571057733738 }, //wonosalam
                '5': { 'nama': 'Kos E', 'lat': -7.574184945369275, 'lng': 112.35647317177406 },
            };

           

            var map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: -7.5606744, lng: 111.9295565 },
                zoom: 10
            });

            // Menambahkan marker dan popup info untuk setiap kos

              // var infowindow = new google.maps.InfoWindow();

              //   var marker, i;
                // const myJSON = JSON.stringify(kosData);
                // const locations = JSON.parse(myJSON);
                // var count = Object.keys(locations).length;

                // for (i = 0; i < count; i++) {  
                //   marker = new google.maps.Marker({
                //     position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                //     map: map
                //   });
                  
                //   // google.maps.event.addListener(marker, 'click', (function(marker, i) {
                //   //   return function() {
                //   //     infowindow.setContent(locations[i][0]);
                //   //     infowindow.open(map, marker);
                //   //   }
                //   // })(marker, i));
                // }

            // for (var kosId in kosData) {
            //     var kos = kosData[kosId];
            //     var marker = new google.maps.Marker({
            //         position: { lat: kos.lat, lng: kos.lng },
            //         map: map,
            //         title: kos.nama
            //     });

            //     // Membuat konten popup info untuk marker
            //     var content = '<h3>' + kos.nama + '</h3>' +
            //         '<p>Latitude: ' + kos.lat + '</p>' +
            //         '<p>Longitude: ' + kos.lng + '</p>';

            //     var infoWindow = new google.maps.InfoWindow({
            //         content: content
            //     });

            //     // Menambahkan event klik pada marker untuk membuka popup info
            //     marker.addListener('click', function () {
            //         infoWindow.open(map, this);
            //     });
            // }

            // Fungsi untuk mencari rute terpendek menggunakan Algoritma Dijkstra
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

                while (Object.keys(nodes).length > 0) {
                    var minDistanceNode = null;

                    for (var node in nodes) {
                        if (minDistanceNode === null || distances[node] < distances[minDistanceNode]) {
                            minDistanceNode = node;
                        }
                    }

                    if (minDistanceNode === end) {
                        break;
                    }

                    var neighbors = nodes[minDistanceNode];

                    for (var neighbor in neighbors) {
                        var alt = distances[minDistanceNode] + neighbors[neighbor];

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

            var start = '1'; // Simpul awal
            var end = '7'; // Simpul tujuan

            // Mencari rute terpendek menggunakan Algoritma Dijkstra
            var shortestPath = dijkstra(graph, start, end);


                var infowindow = new google.maps.InfoWindow();
                var marker, i;
                for (i = 0; i < shortestPath.length; i++) {  
                    console.log(shortestPath[i]);
                  marker = new google.maps.Marker({
                    position: new google.maps.LatLng(kosData[shortestPath[i]].lat, kosData[shortestPath[i]].lng),
                    map: map
                  });
                  
                  google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                      infowindow.setContent(kosData[shortestPath[i]].nama);
                      infowindow.open(map, marker);
                    }
                  })(marker, i));
                }

            // Menampilkan rute terpendek pada peta
            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer({
                suppressMarkers: true
            });

            directionsRenderer.setMap(map);

            var waypoints = [];
            for (var i = 1; i < shortestPath.length - 1; i++) {
                var waypoint = {
                    location: {
                        lat: kosData[shortestPath[i]].lat,
                        lng: kosData[shortestPath[i]].lng
                    },
                    stopover: true
                };
                waypoints.push(waypoint);
            }



            var request = {
                origin: {
                    lat: kosData[shortestPath[0]].lat,
                    lng: kosData[shortestPath[0]].lng
                },
                destination: {
                    lat: kosData[shortestPath[shortestPath.length - 1]].lat,
                    lng: kosData[shortestPath[shortestPath.length - 1]].lng
                },
                waypoints: waypoints,
                optimizeWaypoints: true,
                travelMode: 'DRIVING'
            };

            directionsService.route(request, function (result, status) {
                if (status == 'OK') {
                    directionsRenderer.setDirections(result);
                }
            });
        }
    </script>