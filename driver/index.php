<?php 
  session_start();
  include "dash_driver/config/connect.php";

  if(isset($_SESSION['id_driver'])){
    // fungsi redirect menggunakan javascript
    echo '<script language="javascript"> window.location.href = "dash_driver" </script>';
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Driver</title>
  <!-- bootstrap 5 css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- BOX ICONS CSS-->
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
  <!-- custom css -->
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>

  <!-- Main Wrapper -->
  <div class="my-container">
    <!-- Top Nav -->
    <nav class="navbar top-navbar px-5">
      <a class="btn border-0" id="title"><h5>Omjek Delivery</h5></a>
      <div class="info">
        <i class='bx bxs-info-circle'></i>
      </div>
    </nav>
    <!--End Top Nav -->
    
    <!-- Content -->
    <main>
      <div class="container">
        <form method="post" action="login_func.php">
          <div class="form">
            <div class="text-center">
              <img src="img/omjek.png" class="logo-login mb-3 mt-5">
            </div>
            <div class="mb-3">
              <input type="email" class="form-control" id="email" placeholder="Email" required name="email">
            </div>
            <div class="mb-5">
              <input type="password" class="form-control" id="password" placeholder="Password" required name="password">
              <div class="text-center">
                <p>Belum Punya Akun? <a href="registrasi.php">Registrasi</a></p>
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-danger login">LOGIN</button>
            </div>
            <!-- <button type="button" class="btn btn-danger" id="btn-clear-cache">clear chace</button> -->
          </div>
        </form>
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
        if ($desc == "success-reg") {
      ?>
        <div class="desc-in" data-flashdata="<?php echo $desc; ?>"></div>
      <?php } elseif ($desc == "failed-reg2") { ?>
        <div class="desc-in" data-flashdata="<?php echo $desc; ?>"></div>
      <?php } elseif ($desc == "failed-log") { ?>
        <div class="desc-in" data-flashdata="<?php echo $desc; ?>"></div>
      <?php } ?>
  <?php
    }
  ?>

  <!-- bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="dash_driver/assets/sweetalert/dist/sweetalert2.all.min.js"></script>
  <!-- My Script -->
  <script type="text/javascript" src="js/script.js"></script>
</body>

</html>