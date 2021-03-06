<?php 
  session_start();
  include "config/connect.php";
  include('assets/datetime/datetimeFormat.php');

  if(!isset($_SESSION['id_driver'])){
    // fungsi redirect menggunakan javascript
    echo '<script language="javascript"> window.location.href = "../index.php" </script>';
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Driver</title>
  <!-- bootstrap 5 css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- data tables -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
  <!-- BOX ICONS CSS-->
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
  <!-- custom css -->
  <link rel="stylesheet" href="css/style.css" />
  <!-- sweetalert & jquery -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="assets/sweetalert/dist/sweetalert2.all.min.js"></script>
</head>

<body>
  <!-- Side-Nav -->
  <div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
    <ul class="nav nav-tabs flex-column text-white w-100" id="myTab" role="tablist">
      <a class="nav-link h6 text-white my-2 title-sidenav">
        <div class="img mb-3">
          <img src="../img/ojek-dashboard.png" class="logo-sidebar">
        </div>
        <?php 
          $ad = mysqli_query($mysqli, "SELECT * FROM driver WHERE id_driver = '".$_SESSION['id_driver']."'");
          $ad1 = mysqli_fetch_array($ad);
        ?>
        <h5><?php echo $ad1['nama_driver']; ?></h5>
        <h5>. . . . . . . . . . . . . . . .</h5>
      </a>
      <li class="nav-item" role="presentation">
        <a class="nav-link text-white active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" role="tab" aria-controls="profile" aria-selected="true">
          <i class="bx bx-user-pin"></i>
          <span class="li-sidenav">Kelola Profile</span>
        </a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link text-white" id="orderan-tab" data-bs-toggle="tab" data-bs-target="#orderan" role="tab" aria-controls="orderan" aria-selected="true">
          <i class="bx bx-book-open"></i>
          <span class="li-sidenav">Orderan Masuk</span>
        </a>
      </li>
    </ul>

    <span href="#" class="nav-link h4 w-100 mb-5">
      <a href=""><i class="bx bxl-instagram-alt text-white"></i></a>
      <a href=""><i class="bx bxl-twitter px-2 text-white"></i></a>
      <a href=""><i class="bx bxl-facebook text-white"></i></a>
    </span>
  </div>

  <!-- Main Wrapper -->
  <div class="my-container active-cont">
    <!-- Top Nav -->
    <nav class="navbar top-navbar px-5 sticky-top">
      <div>
        <a class="btn border-0" id="menu-btn"><i class="bx bx-menu"></i></a>
        <a class="btn border-0" id="title"><h5>Omjek Delivery</h5></a>
      </div>
      <div class="info-admin">
        <button type="button" class="btn btn-warning df confirmation-logout">LOGOUT</button>
      </div>
    </nav>

    <script type="text/javascript">
      $('.confirmation-logout').on('click', function(e) {
        Swal.fire({
          title: 'Anda Yakin?',
          text: "Ingin Logout!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Yakin!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = "<?php echo 'func/logout_func.php' ?>";
          }
        })
      });
    </script>
    <!--End Top Nav -->
    
    <!-- Content -->
    <main>
      <div class="container">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <?php include "profile.php"; ?>
          </div>
          <div class="tab-pane fade" id="orderan" role="tabpanel" aria-labelledby="orderan-tab">
            <?php include "orderan.php"; ?>
          </div>
        </div>
      </div>

      <!-- <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="bi bi-exclamation-triangle"></i>
            <strong class="me-auto">Attention!</strong>
            <small>11 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            Chace Terhapus
          </div>
        </div>
      </div> -->
    </main>
  </div>

  <?php
    if (isset($_GET['desc'])) {
      $desc = $_GET['desc']; 
  ?>
      <?php
        if ($desc == "suc-ed-pro") {
      ?>
        <div class="desc-in" data-flashdata="<?php echo $desc; ?>"></div>
      <?php } elseif ($desc == "suc-add-ord") { ?>
        <div class="desc-in" data-flashdata="<?php echo $desc; ?>"></div>
      <?php } elseif ($desc == "suc-com-ord") { ?>
        <div class="desc-in" data-flashdata="<?php echo $desc; ?>"></div>
      <?php } ?>
  <?php
    }
  ?>

  <!-- bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- data tables -->
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
  <!-- My Script -->
  <script type="text/javascript" src="js/script.js"></script>
</body>

</html>