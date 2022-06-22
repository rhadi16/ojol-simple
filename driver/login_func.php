<?php 
	include 'dash_driver/config/connect.php';
	session_start();

	$email = $_POST['email'];

	// $cek_data = mysqli_query($mysqli,"SELECT * FROM admin WHERE email = '$email'");
	$query = "SELECT * FROM driver WHERE email = '$email'";
	$result = $mysqli->query($query);
	$cek_data = $result->fetch_assoc();
	// $jum_data = mysqli_num_rows($cek_data);

	$cek_pass = password_verify($_POST['password'], $cek_data["password"]);

	if ($cek_pass) {
		$_SESSION['id_driver'] = $cek_data["id_driver"];

		echo '<script language="javascript"> window.location.href = "dash_driver/index.php" </script>';
	} else {
		echo '<script language="javascript"> window.location.href = "index.php?desc=failed-log" </script>';
	}
	
?>