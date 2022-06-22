<?php 
	include 'dash_passenger/config/connect.php';
	session_start();

	$email = $_POST['email'];

	// $cek_data = mysqli_query($mysqli,"SELECT * FROM admin WHERE email = '$email'");
	$query = "SELECT * FROM passenger WHERE email = '$email'";
	$result = $mysqli->query($query);
	$cek_data = $result->fetch_assoc();
	// $jum_data = mysqli_num_rows($cek_data);

	$cek_pass = password_verify($_POST['password'], $cek_data["password"]);

	if ($cek_pass) {
		$_SESSION['id_passenger'] = $cek_data["id_passenger"];

		echo '<script language="javascript"> window.location.href = "dash_passenger/index.php" </script>';
	} else {
		echo '<script language="javascript"> window.location.href = "index.php?desc=failed-log" </script>';
	}
	
?>