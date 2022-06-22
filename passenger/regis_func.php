<?php 
	include 'dash_passenger/config/connect.php';

	$nama_passenger	= $_POST['nama_passenger'];
	$email 			= $_POST['email'];
	$password 		= password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
	$no_hp 			= $_POST['no_hp'];

	$cek_data = mysqli_query($mysqli,"SELECT * FROM passenger WHERE email = '$email'");
	$jum_data = mysqli_num_rows($cek_data);

	if ($jum_data >= 1) {
		echo '<script language="javascript"> window.location.href = "registrasi.php?desc=failed-reg" </script>';
	} else {
		$result = mysqli_query($mysqli, "INSERT INTO passenger (id_passenger, nama_passenger, email, password, no_hp) 
										VALUES(null, '$nama_passenger', '$email', '$password', '$no_hp')") or die(mysqli_error($mysqli));

		if ($result) {
			echo '<script language="javascript"> window.location.href = "index.php?desc=success-reg" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "index.php?desc=failed-reg2" </script>';
		}
	}
?>