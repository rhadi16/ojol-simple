<?php 
  $passenger = $_SESSION['id_passenger'];
  $qry2 = "SELECT
            *,
            b.no_hp no_driver
          FROM orderan a
          LEFT JOIN driver b ON a.id_driver = b.id_driver
          LEFT JOIN passenger c ON a.id_passenger = c.id_passenger
          WHERE stat_order != 'Selesai' AND a.id_passenger = '$passenger'";
?>

<div class="head-dt pb-2 mt-4">
  <h5>Daftar Orderan</h5>
  <?php 
    $pas = mysqli_query($mysqli, $qry2);
    $jum = mysqli_num_rows($pas);

    if ($jum <= 0) {
  ?>
      <button type="button" class="btn btn-success df" data-bs-toggle="modal" data-bs-target="#tambah-order">Order</button>
  <?php } ?>
</div>

<!-- Modal Tambah Anggota -->
<div class="modal fade" id="tambah-order" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Alamat Tujuan</h5>
      </div>
      <form action="func/order_func.php?action=insert" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <input type="hidden" class="form-control" name="id_passenger" required value="<?php echo $passenger; ?>">
          <input type="hidden" class="form-control" name="lat" required id="lat">
          <input type="hidden" class="form-control" name="lon" required id="lon">
          <div class="mb-3">
            <input type="text" class="form-control" name="tujuan" required placeholder="Masukkan Tujuan Anda">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="datatable">
  <table id="example2" class="table table-striped align-middle text-center" style="width:100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Penumpang</th>
        <th>Tujuan</th>
        <th>Driver</th>
        <th>Nomor Driver</th>
        <th>Status Order</th>
        <th>Action</th>
      </tr>
    </thead>
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
            <td>
              <?php 
                if ($data2['id_driver'] == 0) {
                  echo 'Belum ada driver';
                 } else {
                  echo $data2['nama_driver'];
                 }
              ?>
            </td>
            <td><?php echo $data2['no_driver'] ?></td>
            <td><?php echo $data2['stat_order'] ?></td>
            <td>
              <button type="button" class="btn btn-danger mb-1 conf-del<?php echo $data2['id_order']; ?>">Hapus</button>
              <button type="button" class="btn btn-warning mb-1" id="btn-edit" data-bs-toggle="modal" data-bs-target="#edit-tujuan<?php echo $data2['id_order']; ?>">Edit</button>
            </td>
          </tr>

          <script type="text/javascript">
            $('.conf-del<?php echo $data2['id_order']; ?>').on('click', function(e) {
              Swal.fire({
                title: 'Anda Yakin?',
                text: "Ingin Menghapus Tujuan <?php echo $data2['tujuan']; ?>!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Yakin!'
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = "<?php echo 'func/order_func.php?action=delete&id_order='.$data2['id_order'] ?>";
                }
              })
            });
          </script>

          <!-- Modal Edit Anggota -->
          <div class="modal fade" id="edit-tujuan<?php echo $data2['id_order']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Tujuan</h5>
                </div>
                <form action="func/order_func.php?action=update" enctype="multipart/form-data" method="post">
                  <div class="modal-body">
                    <div class="mb-3">
                      <input type="hidden" name="id_order" value="<?php echo $data2['id_order'] ?>">
                      <input type="hidden" name="lat" id="lat1">
                      <input type="hidden" name="lon" id="lon1">
                      <input type="text" class="form-control" name="tujuan" required placeholder="Tujuan Anda" value="<?php echo $data2['tujuan'] ?>">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Ubah</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
      <?php } ?>
    </tbody>
    <tfoot>
      <tr>
        <th>No</th>
        <th>Nama Penumpang</th>
        <th>Tujuan</th>
        <th>Driver</th>
        <th>Nomor Driver</th>
        <th>Status Order</th>
        <th>Action</th>
      </tr>
    </tfoot>
  </table>
</div>