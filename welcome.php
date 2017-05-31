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
		$id = $_SESSION['id'];
    //echo $id;
		$name = $_SESSION['user'];
	}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Users</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://fonts.googleapis.com/css?family=Changa:200|Source+Sans+Pro:200" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
<a href="logout.php">logout</a>
  <div class="container">
    <table></table>
  </div>
</body>
</html>