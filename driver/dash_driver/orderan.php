<script src="js/geo-min.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<!-- <script type="text/javascript">
  let lat = 0;
  let lon = 0;


  if(geo_position_js.init()){
    geo_position_js.getCurrentPosition(success_callback1,error_callback,{enableHighAccuracy:true});
  }
  else{
    alert("Functionality not available");
  }
</script> -->
<?php 
  $driver = $_SESSION['id_driver'];
  $qry2 = "SELECT
            *,
            c.no_hp no_passenger
          FROM orderan a
          LEFT JOIN driver b ON a.id_driver = b.id_driver
          LEFT JOIN passenger c ON a.id_passenger = c.id_passenger
          WHERE stat_order != 'Selesai' OR a.id_driver = 0";
?>

<div class="head-dt pb-2 mt-4">
  <h5>Orderan Masuk</h5>
</div>

<div class="datatable">
  <table id="example2" class="table table-striped align-middle text-center" style="width:100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Penumpang</th>
        <th>Tujuan</th>
        <th>Nomor HP/WA</th>
        <th>Action</th>
      </tr>
    <tbody>
      <?php
        $no = 1;
        $query2 = mysqli_query($mysqli, $qry2);
        while ($data2 = mysqli_fetch_array($query2)) {
      ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $data2['nama_passenger'] ?></td>
            <td><?php echo $data2['tujuan'] ?></td>
            <td><?php echo $data2['no_passenger'] ?></td>
            <td>
              <?php if ($data2['id_driver'] == 0) { ?>
                <button type="button" class="btn btn-success mb-1 conf-ord<?php echo $data2['id_order']; ?>">Ambil Orderan</button>
              <?php } else { ?>
                <button type="button" class="btn btn-danger mb-1 conf-sel<?php echo $data2['id_order']; ?>">Selesai</button>
              <?php } ?>
              <button type="button" class="btn btn-primary mb-1" id="lokasi" data-bs-toggle="modal" data-bs-target="#lokasi<?php echo $data2['id_order']; ?>">Titik Jemput</button>
            </td>
          </tr>

          <script type="text/javascript">
            $('.conf-ord<?php echo $data2['id_order']; ?>').on('click', function(e) {
              Swal.fire({
                title: 'Anda Yakin?',
                text: "Ingin Mengambil Orderan <?php echo $data2['nama_passenger']; ?>!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Yakin!'
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = "<?php echo 'func/orderan_func.php?action=update&id_order='.$data2['id_order'].'&id_driver='.$driver ?>";
                }
              })
            });

            $('.conf-sel<?php echo $data2['id_order']; ?>').on('click', function(e) {
              Swal.fire({
                title: 'Anda Yakin?',
                text: "Orderan <?php echo $data2['nama_passenger']; ?> Telah Selesai!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Yakin!'
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = "<?php echo 'func/orderan_func.php?action=clear&id_order='.$data2['id_order'] ?>";
                }
              })
            });
          </script>

          <!-- Modal Maps -->
          <div class="modal fade" id="lokasi<?php echo $data2['id_order']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Lokasi Penumpang</h5>
                </div>
                <form action="func/buku_func.php?action=update" enctype="multipart/form-data" method="post">
                  <div class="modal-body">
                    <div id="mapid<?php echo $data2['id_order']; ?>" style="height: 60vh; width: 100%;"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <script type="text/javascript">
            if(geo_position_js.init()){
              geo_position_js.getCurrentPosition(success_callback<?php echo $data2['id_order']; ?>,error_callback<?php echo $data2['id_order']; ?>,{enableHighAccuracy:true});
            }
            else{
              alert("Functionality not available");
            }

            function success_callback<?php echo $data2['id_order']; ?>(p)
            {
              // alert('lat='+p.coords.latitude.toFixed(7)+';lon='+p.coords.longitude.toFixed(7));
              let lat<?php echo $data2['id_order']; ?> = p.coords.latitude.toFixed(7);
              let lon<?php echo $data2['id_order']; ?> = p.coords.longitude.toFixed(7);

              let greenIcon = new L.Icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
              });

              let mymap<?php echo $data2['id_order']; ?> = L.map('mapid<?php echo $data2['id_order']; ?>').setView([<?php echo $data2['lat']; ?>, <?php echo $data2['lon']; ?>], 15);

              L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
              }).addTo(mymap<?php echo $data2['id_order']; ?>);

              let penumpang<?php echo $data2['id_order']; ?> = L.marker([<?php echo $data2['lat']; ?>, <?php echo $data2['lon']; ?>]).addTo(mymap<?php echo $data2['id_order']; ?>);
              let driver<?php echo $data2['id_order']; ?> = L.marker([lat<?php echo $data2['id_order']; ?>, lon<?php echo $data2['id_order']; ?>], {icon: greenIcon}).addTo(mymap<?php echo $data2['id_order']; ?>);
              // $('#lokasi').click(function() {
              //   geo_position_js.getCurrentPosition(success_callback<?php echo $data2['id_order']; ?>,error_callback,{enableHighAccuracy:true});
              // });

              penumpang<?php echo $data2['id_order']; ?>.bindPopup(`
                <b>Lokasi Penumpang</b>
              `);
              driver<?php echo $data2['id_order']; ?>.bindPopup(`
                <b>Lokasi Anda</b>
              `);
            }

            function error_callback<?php echo $data2['id_order']; ?>(p)
            {
              alert('error='+p.message);
            }
          </script>
      <?php } ?>
    </tbody>
    <tfoot>
      <tr>
        <th>No</th>
        <th>Nama Penumpang</th>
        <th>Tujuan</th>
        <th>Nomor HP/WA</th>
        <th>Action</th>
      </tr>
    </tfoot>
  </table>
</div>