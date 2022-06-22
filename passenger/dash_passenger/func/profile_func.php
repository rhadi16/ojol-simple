<?php 

	include '../config/connect.php';

	$action  = $_GET['action'];

	if($action == "update") {

		$id_passenger 	 = $_POST['id_passenger'];
		$nama_passenger  = $_POST['nama_passenger'];
		$email 			 = $_POST['email'];
		if ($_POST['password'] == '') {
			$password  = $_POST['password_lama'];
		} else {
			$password 	= password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
		}
		$no_hp 			= $_POST['no_hp'];

		$result = mysqli_query($mysqli, "UPDATE passenger
			  									SET 
			  									   nama_passenger	= '$nama_passenger',
			  									   email 				= '$email',
			  									   password 		= '$password',
			  									   no_hp				= '$no_hp'
			  									   WHERE id_passenger = '$id_passenger'
			  									") or die(mysqli_error($mysqli));

		if ($result) {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=suc-ed-pro" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=fal-ed-pro" </script>';
		}

	} 

?>