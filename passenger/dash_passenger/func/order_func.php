<?php 

	include '../config/connect.php';

	$action  = $_GET['action'];

	if ($action == "insert") {
		
		$id_passenger 	= $_POST['id_passenger'];
		$lat 			= $_POST['lat'];
		$lon 			= $_POST['lon'];
		$tujuan 		= $_POST['tujuan'];
		$id_driver 		= 0;
		$stat_order 	= "Mencari Driver";

		$result = mysqli_query($mysqli, "INSERT INTO orderan (id_order, id_passenger, lat, lon, tujuan, id_driver, stat_order) 
										 VALUES(null, '$id_passenger', '$lat', '$lon', '$tujuan', '$id_driver', '$stat_order')") or die(mysqli_error($mysqli));

		if ($result) {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=suc-in-ord" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=fal-in-ord" </script>';
		}
		
	} elseif($action == "update") {

		$id_order 	= $_POST['id_order'];
		$lat 		= $_POST['lat'];
		$lon 		= $_POST['lon'];
		$tujuan 	= $_POST['tujuan'];

		$result = mysqli_query($mysqli, "UPDATE orderan
			  									SET 
			  									   lat		= '$lat',
			  									   lon		= '$lon',
			  									   tujuan	= '$tujuan'
			  									   WHERE id_order = '$id_order'
			  									") or die(mysqli_error($mysqli));

		if ($result) {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=suc-ed-ord" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=fal-ed-ord" </script>';
		}

	} elseif($action == "delete") {

		$id_order = $_GET['id_order'];

		$result = mysqli_query($mysqli, "DELETE FROM orderan WHERE id_order = '$id_order'") or die(mysqli_error($mysqli));

		if ($result) {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=suc-del-ord" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=fal-del-ord" </script>';
		}

	}

?>