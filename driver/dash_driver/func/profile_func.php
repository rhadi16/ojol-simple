<?php 

	include '../config/connect.php';

	$action  = $_GET['action'];

	if($action == "update") {

		$id_driver 	 = $_POST['id_driver'];
		$nama_driver = $_POST['nama_driver'];
		$email 			 = $_POST['email'];
		if ($_POST['password'] == '') {
			$password  = $_POST['password_lama'];
		} else {
			$password 	= password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
		}
		$no_hp 			= $_POST['no_hp'];

		$result = mysqli_query($mysqli, "UPDATE driver
			  									SET 
			  									   nama_driver	= '$nama_driver',
			  									   email 				= '$email',
			  									   password 		= '$password',
			  									   no_hp				= '$no_hp'
			  									   WHERE id_driver = '$id_driver'
			  									") or die(mysqli_error($mysqli));

		if ($result) {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=suc-ed-pro" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=fal-ed-pro" </script>';
		}

	} 

?>