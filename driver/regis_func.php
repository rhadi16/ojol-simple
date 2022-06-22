<?php 
	include 'dash_driver/config/connect.php';

	$nama_driver= $_POST['nama_driver'];
	$email 		= $_POST['email'];
	$password 	= password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
	$no_hp 		= $_POST['no_hp'];

	$cek_data = mysqli_query($mysqli,"SELECT * FROM driver WHERE email = '$email'");
	$jum_data = mysqli_num_rows($cek_data);

	if ($jum_data >= 1) {
		echo '<script language="javascript"> window.location.href = "registrasi.php?desc=failed-reg" </script>';
	} else {
		$result = mysqli_query($mysqli, "INSERT INTO driver (id_driver, nama_driver, email, password, no_hp) 
										VALUES(null, '$nama_driver', '$email', '$password', '$no_hp')") or die(mysqli_error($mysqli));

		if ($result) {
			echo '<script language="javascript"> window.location.href = "index.php?desc=success-reg" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "index.php?desc=failed-reg2" </script>';
		}
	}
?>