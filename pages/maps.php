
<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>
<div id="map"></div>

<script>
        // Array of markers with their details

        <?php 
            $dd = array();
            $result = mysqli_query($conn,"SELECT * FROM m_kos");
            while ($data = mysqli_fetch_array($result)) {
                $dd [] = [
                    'location' => ['lat' => $data['lat'], 'lng'=>$data['lng']],
                    'title' => $data['nama'],
                    'description' => "<img src='".$base_url."upload/".$data['gambar']."' style='height : 100px; width:100px' /> <br> Nama Kos : <b>".$data['nama']."</b> <br> Deskripsi : ".$data['deskripsi']." <br><a href='".$base_url."pemesanan/".$data['id']."' class='btn btn-sm btn-primary btn-block'>Pesan</a>"
                ];
            }
        ?>
        var markers =  <?php echo json_encode($dd, JSON_NUMERIC_CHECK); ?>



        // Initialize and display the map
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
               center: { lat: -7.5606744, lng: 111.9295565 },
               zoom: 10,
               
           });

            // Create markers and popups
            markers.forEach(function(markerInfo) {
                var marker = new google.maps.Marker({
                    position: markerInfo.location,
                    map: map,
                    icon: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAADwUlEQVR4nO2Yy09TQRTGP3UhLnytFJWduDQxxEdwbknEhehCjPH9+hOMMZIu3OCDhRp8RYyvnfGxcOVKJEYgYkIMIBgjvoCIYlvU8LhtbbGfmbESuZ1LW5iWmnCSk7S3vXO/38w5c84dYNqmLTeMazCPAnsocIMCzbTgp4VI3P3xa9cpsJvFmItcMQqsoIVbtGDTAlN0mwI36UHh1AlfhzkUOEeBaBrCnR6hwBmWIC+74j0opEDHJIQ7/Tkt5GdL/Kp4fNOoC3yiwMpMiy8cT3xs80JGTx1kuO4+Q51ttL/5lcvP4cf3GD15gLGyBeNDlGBxZsSXII8W2rQP3jiHkZoKBgNfadv2uB4M9DFy5Zi6h3qQFzK/zAPIhNXNenk+Q60NSYU7PdT+nLHtBW4QlabFr9DtNrFtSxnseZe2+NHV6HnL2LYlulAaMhpK8X0+IWxCL5+5ihscGqb3QQ+P3O/mwNCw+0q0NpKlebpVqDFXYTVFKnLV6yoq8GOI+25+YH5Fu/Kd197T93149Lvz/5HLR3WrMGykYqv2QLPbuCXsx74Bbqh+Myr2r/97TZfYMf3utMsEwA3nwNFTh7TiWz7+YNHp1wnina67N3pivw7gmgmAZufAcp93CnjYGuDy46+Sipcu/+u8P1x7V1uhTQAEnAMH342dxVsNfSzwdqQkXvoybwfP134em8ydbToA3+QBLPx0Dmz3+xJmMFXxrmHU79MlctgEgJ0NgGDgq3YnMgHQkxBCss9JApDu76HOVl0IdZsAaExI4sf3jAOEa+/oABoz0gPJrtI0QLRyry6EzpoAKNcXsj5jAEH/F8Y2zdcBlJtqowcSWokrx4wBRC4d0YXPoLG2mgK3Ex5QmqcaMbd+KFUPtdTrmzmB20bExwHW6/p22QrLlnii4oPdnep9Qjc2LRQbA4hDNLm+0LTUpz/z7U3uLzQCzUbFKwALW1xmSoWAbImdia2ddf+XPzG/YbbbzEvfYhwgDlE3zkNVSyy7SlknZGFSFbvfpz7LZi1auU+/21hj/GlGxCsAgSIKjCQRMHEXGJHPyBiAgrBwMYMAFzIqXgEUYy4FujIgvitrh770YLWuzZ6E+KjxbTMphAWvwRXwZlW8AgBmUuCRgdl/wh2YlXUABbEWi2ihdxIAvXKMKRE/5rRanqSlL96WuYRcMK5HWZr14RctbEUuGT04nDKAB4eRi0aBqhQAqpHLRpdj+PiOcxm5bgRm6I4j1TVgBv4Ho4SwUP0PQI2sG/jfjDInBKqmWse0TRvc7TduViw4tBY+mwAAAABJRU5ErkJggg==',
                    title: markerInfo.title
                });

                var infoWindow = new google.maps.InfoWindow({
                    content: ""+markerInfo.description+""
                });

                // Show popup when marker is clicked
                marker.addListener('click', function() {
                    infoWindow.open(map, marker);
                });
            });
        }
    </script>
