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

    <?php 
    if (isset($_POST['nama'])) {
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $lat = $_POST['lat'];
        $lng = $_POST['lng'];
        $id_mitra = $_POST['id_mitra'];
        $alamat = $_POST['alamat'];
        $deskripsi = $_POST['deskripsi'];
        $date            = date("Y-m-d");

        $temp_name       = $_FILES['gambar']['tmp_name'];
        $name_file       = $_FILES['gambar']['name'];
        $type_file       = $_FILES['gambar']['type'];
        $size            = $_FILES['gambar']['size'];
        $nama_gambar        = $_REQUEST['nama_gambar'];
// var_dump($nama_gambar);

        if (empty($temp_name)) {
            $set_gambar = ",gambar='".$nama_gambar."'";
        }else{  
            $file_ext=strtolower(end(explode('.',$_FILES['gambar']['name'])));
            $expensions= array("jpeg","jpg","png");

            if (in_array($file_ext,$expensions)=== false) {
                echo "salah";
            }elseif($size >= 3097152){
                echo "upload maksimal 3 mb";
            }else{
                $Move = move_uploaded_file($temp_name, 'upload/'.$date."-".$name_file.'');
                if ($Move) {
                    unlink('"upload/'.$file.'"');
                    $nm_foto  = $date."-".$name_file;
                }
            }

            $set_gambar = ",gambar='".$nm_foto."'";
        }

        if(!empty($_REQUEST['id'])){
            $sql = "UPDATE m_kos SET  kode='".$kode."', nama='".$nama."', id_mitra='".$id_mitra."', deskripsi='".$deskripsi."', alamat='".$alamat."', lat='".$lat."', lng='".$lng."', deskripsi='".$deskripsi."' ".$set_gambar." WHERE id='".$_REQUEST['id']."'";
        }else{
            $sql = "INSERT INTO `m_kos`(`kode`,`nama`, `id_mitra`, `deskripsi`, `alamat`, `lat`, `lng`, `gambar`) VALUES ('".$kode."','".$nama."','".$id_mitra."','".$deskripsi."','".$alamat."','".$lat."','".$lng."','".$nm_foto."')";
        }

// echo  $sql;
        $exc = mysqli_query($conn,$sql);
        if ($exc) {
            echo '
            <div class="alert alert-success alert-dismissible" role="alert">
            <div class="alert-message">
            <strong>Perhatian !! Data berhasil disimpan</strong>
            </div>
            </div>

            <meta http-equiv="refresh" content="1">

            ';
        }else{
            echo '
            <div class="alert alert-danger alert-dismissible" role="alert">
            <div class="alert-message">
            <strong>Perhatian !! Data gagal disimpan</strong>
            </div>
            </div>


            ';
        }
    }

    if (!empty($_REQUEST['id'])) {
        $datane = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM m_kos WHERE id='".$_REQUEST['id']."'"));
    }
    ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-teal">
                <div class="panel-heading">
                    Tambah vertex / master kos
                </div>
                <div class="panel-body">
                    <form method="POST" action="" class="form-horizontal" enctype="multipart/form-data">
                        <fieldset>
                           <div class="form-group">
                            <label class="col-sm-2 control-label">Kode Huruf</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="kode" placeholder="A, B , C , D , E , F" value="<?php echo $datane['kode']; ?>" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Pemilik Kos</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_mitra"  required="">
                                    <option value="">Pilih Pengguna</option>
                                    <?php 
                                    $pengguna = mysqli_query($conn,"SELECT * FROM m_mitra");
                                    foreach ($pengguna as $key => $damit):
                                        ?>

                                        <option value="<?php echo $damit['id']; ?>" 
                                            <?php echo ($datane['id_mitra']==$damit['id']) ? "selected": ""; ?>
                                            ><?php echo "#".$damit['id']." ".$damit['nama']; ?></option>
                                            <?php endforeach; ?>X
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Kos</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama" value="<?php echo $datane['nama']; ?>" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Peta</label>
                                    <div class="col-sm-10">
                                        <button type="button" class="btn btn-teal btn-rounded" data-toggle="modal" data-target=".bs-example-modal-lg">Show Maps</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Latitude</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" readonly="" id="latitudeInput" name="lat" value="<?php echo $datane['lat']; ?>"  required="">
                                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <input type="text" id="searchTextField" placeholder="Masukkan alamat">
                                                    </div>
                                                    <div class="modal-body" id="map" style="height: 400px !important"></div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary"  data-dismiss="modal">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Longitude</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly="" class="form-control" id="longitudeInput" name="lng" value="<?php echo $datane['lng']; ?>"  required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="detail_almat" name="alamat"><?php echo $datane['alamat']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Deskripsi Kos</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="deskripsi"  required=""><?php echo $datane['deskripsi']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label" for="example-fileinput">Gambar</label>

                                    <div class="col-sm-10">
                                        <?php if (!empty($datane['gambar'])) :?>
                                            <img src="<?php echo $base_url.'/upload/'.$datane['gambar']; ?>"  style="width: 300px; height: 300px"/>
                                            <input type="file" class="form-control" name="gambar">
                                            <input type="hidden" class="form-control" name="nama_gambar" value="<?php echo $datane['gambar']; ?>">
                                            <?php else : ?>
                                                <input type="file" class="form-control" name="gambar" required="">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                            <a href="<?php echo $base_url; ?>master_kos" class="btn btn-danger">Kembali</a>
                                            <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




            <script>
                var map;
                var marker;

                function initMap() {
var initialLatLng = { lat: -7.561479, lng: 112.2592315 }; // Koordinat Jakarta

map = new google.maps.Map(document.getElementById('map'), {
    center: initialLatLng,
    zoom: 12
});

marker = new google.maps.Marker({
    position: initialLatLng,
    map: map,
    draggable: true
});

// Event listener saat marker di-drag
marker.addListener('dragend', function () {
    updateMarkerPosition(marker.getPosition());
});

// Seacrg bar

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
