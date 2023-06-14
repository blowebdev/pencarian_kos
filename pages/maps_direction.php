<a href="kos" class="btn btn-danger">Kembali</a> <br>
<div class="alert alert-success">

    Direction rute terdekat dari <b><?php echo $_REQUEST['alamat']; ?></b> Ke kos yang terdebar di database.
</div>
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
$damarker[] = [
    'lat' => $lat,
    'lng' => $lng,
    'label' => "lokasi anda sekarang",
    'description'=>'label',
    'icon' => ''
];
while ($marker = mysqli_fetch_array($q)) {
    $damarker[] = [
        'lat' => $marker['lat'],
        'lng' => $marker['lng'],
        'label' => $marker['nama'],
        'description' => "<img src='".$base_url."upload/".$marker['gambar']."' style='height : 100px; width:100px' /> <br> Nama Kos : <b>".$marker['nama']."</b> <br> Deskripsi : ".$marker['deskripsi']." <br><a href='".$base_url."pemesanan/".$marker['id']."' class='btn btn-sm btn-primary btn-block'>Pesan</a>",
        'icon'=>'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAADwUlEQVR4nO2Yy09TQRTGP3UhLnytFJWduDQxxEdwbknEhehCjPH9+hOMMZIu3OCDhRp8RYyvnfGxcOVKJEYgYkIMIBgjvoCIYlvU8LhtbbGfmbESuZ1LW5iWmnCSk7S3vXO/38w5c84dYNqmLTeMazCPAnsocIMCzbTgp4VI3P3xa9cpsJvFmItcMQqsoIVbtGDTAlN0mwI36UHh1AlfhzkUOEeBaBrCnR6hwBmWIC+74j0opEDHJIQ7/Tkt5GdL/Kp4fNOoC3yiwMpMiy8cT3xs80JGTx1kuO4+Q51ttL/5lcvP4cf3GD15gLGyBeNDlGBxZsSXII8W2rQP3jiHkZoKBgNfadv2uB4M9DFy5Zi6h3qQFzK/zAPIhNXNenk+Q60NSYU7PdT+nLHtBW4QlabFr9DtNrFtSxnseZe2+NHV6HnL2LYlulAaMhpK8X0+IWxCL5+5ihscGqb3QQ+P3O/mwNCw+0q0NpKlebpVqDFXYTVFKnLV6yoq8GOI+25+YH5Fu/Kd197T93149Lvz/5HLR3WrMGykYqv2QLPbuCXsx74Bbqh+Myr2r/97TZfYMf3utMsEwA3nwNFTh7TiWz7+YNHp1wnina67N3pivw7gmgmAZufAcp93CnjYGuDy46+Sipcu/+u8P1x7V1uhTQAEnAMH342dxVsNfSzwdqQkXvoybwfP134em8ydbToA3+QBLPx0Dmz3+xJmMFXxrmHU79MlctgEgJ0NgGDgq3YnMgHQkxBCss9JApDu76HOVl0IdZsAaExI4sf3jAOEa+/oABoz0gPJrtI0QLRyry6EzpoAKNcXsj5jAEH/F8Y2zdcBlJtqowcSWokrx4wBRC4d0YXPoLG2mgK3Ex5QmqcaMbd+KFUPtdTrmzmB20bExwHW6/p22QrLlnii4oPdnep9Qjc2LRQbA4hDNLm+0LTUpz/z7U3uLzQCzUbFKwALW1xmSoWAbImdia2ddf+XPzG/YbbbzEvfYhwgDlE3zkNVSyy7SlknZGFSFbvfpz7LZi1auU+/21hj/GlGxCsAgSIKjCQRMHEXGJHPyBiAgrBwMYMAFzIqXgEUYy4FujIgvitrh770YLWuzZ6E+KjxbTMphAWvwRXwZlW8AgBmUuCRgdl/wh2YlXUABbEWi2ihdxIAvXKMKRE/5rRanqSlL96WuYRcMK5HWZr14RctbEUuGT04nDKAB4eRi0aBqhQAqpHLRpdj+PiOcxm5bgRm6I4j1TVgBv4Ho4SwUP0PQI2sG/jfjDInBKqmWse0TRvc7TduViw4tBY+mwAAAABJRU5ErkJggg=='
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
                    position: {lat: parseInt(markers[i].lat), lng: parseInt(markers[i].lng)},
                    map: map,
                    icon : markers[i].icon,
                    label: markers[i].label
                });

                console.log(markers[i].icon);
                var infoWindow = new google.maps.InfoWindow({
                    content: ""+markers[i].description+""
                });

                // Show popup when marker is clicked
                marker.addListener('click', function() {
                    infoWindow.open(map, marker);
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

