<style type="text/css">
    .pac-container {
        background-color: #FFF;
        z-index: 2001;
        position: fixed;
        display: inline-block;
        float: left;
    }
    .modal{
        z-index: 2000;
    }
    .modal-backdrop{
        z-index: 1000;
        }​
    </style>
    <button type="button" onclick="getLocation()" class="btn btn-teal btn-rounded" data-toggle="modal" data-target=".bs-example-modal-lg">Lokasi anda sekarang</button>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <form action="" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <input type="text" id="searchTextField" name="alamat" placeholder="Masukkan alamat">
                        <input type="hidden" name="lat" id="latitudeInput">
                        <input type="hidden" name="lng" id="longitudeInput">
                    </div>
                    <div class="modal-body" id="map" style="height: 400px !important"></div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="cari_rute">Cari Kos Terdekat</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary collapsed">
                <div class="panel-body">
                    <?php 
                    if(isset($_REQUEST['cari_rute'])) :
                        ?>
                        <div class="alert alert-success">
                            <i class="fa fa-map"></i> Lokasi anda saat ini : <b><?php echo $_REQUEST['alamat']; ?></b> <br>
                            Berikut adalah rekomendasi rute / jarak yang paling terdekat dari lokasi yang anda inputkan <br>
                            <br>
                            <form action="maps_direction" method="POST">
                                <input type="hidden" value="<?php echo $_REQUEST['lat']; ?>" name="lat">
                                <input type="hidden" value="<?php echo $_REQUEST['lng']; ?>" name="lng">
                                <button type="submit" class="btn btn-danger"><i class="fa fa-map"></i> Rekomendasi Rute Terdekat</button>
                            </form>
                        </div>


                    <?php endif; ?>
                    <table  class="table table-striped dt-responsive nowrap">
                        <thead class="bg-primary">
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th nowrap="">Nama</th>
                                <th>Alamat</th>
                                <th nowrap="">Harga / Bulan</th>
                                <th nowrap="">Rekomendasi <br>Jarak/Rute<br> Paling Dekat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                           <?php 
                           $no=1;
                           if (isset($_REQUEST['cari_rute'])) {
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
                        }else{
                         $q = mysqli_query($conn,"SELECT a.*, b.nama as mitra FROM m_kos as a 
                            LEFT JOIN m_mitra as b ON a.id_mitra = b.id");
                     }
                     while ($d = mysqli_fetch_array($q)) :
                       ?>
                       <tr>
                           <td width="1%"><?php echo $no++; ?></td>
                           <td>
                              <img src="<?php echo $base_url; ?>upload/<?php echo $d['gambar']; ?>" style="width:200px; height: 100px">
                          </td>
                          <td nowrap="" style="font-weight: bold;"><u><?php echo $d['nama']; ?></u></td>                          <td><?php echo $d['alamat']; ?></td>
                          <td>Rp. <?php echo number_format($d['harga']); ?></td>
                          <td style="font-weight: bold;" nowrap=""><?php echo (empty($_REQUEST['lat'])) ? "lokasi saat dahulu": number_format($d['distance'],5)." Km"; ?> </td>
                          <td nowrap="">
                           <form action="<?php echo $base_url; ?>pemesanan/<?php echo $d['id']; ?>" method="POST">
                               <button type="submit" name="pesan" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart "></i> Pesan</button>
                               <a href="https://www.google.com/maps/dir/?api=1&origin=<?php echo $_REQUEST['lat']; ?>,<?php echo $_REQUEST['lng']; ?>&destination=<?php echo $d['lat']; ?>,<?php echo $d['lng']; ?>" target="_blank" type="submit" name="pesan" class="btn btn-danger btn-sm"><i class="fa fa-car "></i> Direction</a>
                           </form>
                       </td>
                   </tr>
               <?php endwhile; ?>
           </tbody>
       </table>
   </div>
</div>
</div>
</div>


<script>
    var map;
    var marker;

    function initMap() {
        var initialLatLng = { lat: -7.561479, lng: 112.2592315 };

        map = new google.maps.Map(document.getElementById('map'), {
            center: initialLatLng,
            zoom: 12
        });
        marker = new google.maps.Marker({
            position: initialLatLng,
            map: map,
            draggable: true
        });
        marker.addListener('dragend', function () {
            updateMarkerPosition(marker.getPosition());
        });
        var input = document.getElementById('searchTextField');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            var lat = place.geometry.location.lat();
            var long = place.geometry.location.lng();
            var panjang = place.address_components.length;
            var index =place.address_components;
            geocodeAddress(place);
            document.getElementById('city2').value = place.name;
            document.getElementById('cityLat').value = place.geometry.location.lat();
            document.getElementById('cityLng').value = place.geometry.location.lng();
        });
    }

    function geocodeAddress(place) {
        var geocoder = new google.maps.Geocoder();
        var address = document.getElementById('searchTextField').value;
        geocoder.geocode({ 'address': address }, function (results, status) {
            if (status === 'OK') {
                var location = results[0].geometry.location;
                map.setCenter(location);
                marker.setPosition(location);
                updateMarkerPosition(location);
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }

    function updateMarkerPosition(latLng) {
        document.getElementById('latitudeInput').value = latLng.lat();
        document.getElementById('longitudeInput').value = latLng.lng();
        document.getElementById('detail_almat').value = document.getElementById('searchTextField').value;
    }

    google.maps.event.addDomListener(window, 'load', initialize);

</script>