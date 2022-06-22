<?php 

	include '../config/connect.php';

	$action  = $_GET['action'];

	if($action == "update") {

		$id_order	= $_GET['id_order'];
		$id_driver 	= $_GET['id_driver'];

		$result = mysqli_query($mysqli, "UPDATE orderan
			  									SET 
			  									   id_driver	= '$id_driver',
			  									   stat_order	= 'Dalam Perjalanan'
			  									   WHERE id_order = '$id_order'
			  									") or die(mysqli_error($mysqli));

		if ($result) {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=suc-add-ord" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=fal-add-ord" </script>';
		}

	} elseif($action == "clear") {

		$id_order = $_GET['id_order'];

		$result = mysqli_query($mysqli, "UPDATE orderan
			  									SET 
			  									   stat_order	= 'Selesai'
			  									   WHERE id_order = '$id_order'
			  									") or die(mysqli_error($mysqli));

		if ($result) {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=suc-com-ord" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=fal-del-book" </script>';
		}

	}

?>