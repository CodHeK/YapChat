<?php 
	session_start();
	if(!isset($_SESSION['user'])) {
		echo '<script language="javascript">';
				echo 'alert("First Login!");';
				echo '</script>';
				header("Location:login.php");
		exit();
	}
	else {
		session_unset();
		session_destroy();
		header('Location:login.php');
	}
?>