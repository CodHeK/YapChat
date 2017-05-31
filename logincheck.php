<?php 
	session_start();

	if(isset($_POST['login'])) {
		define('MyConst', TRUE);
	}

	if(!defined('MyConst')) {
		echo '<script language="javascript">';
		echo 'alert("Access Denied");';
		echo '</script>';
		header("Refresh: 1; url=login.php");
	}
	else {
		if(!empty($_POST['name']) && !empty($_POST['password'])) {
			$name = htmlentities($_POST['name']);
			$pass = md5(htmlentities($_POST['password']));
		}
		else {
			echo '<script language="javascript">';
				echo 'alert("Enter All the Details first !");';
				echo '</script>';
				header("Location:login.php");
		}
	

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "phpchat";
		$tbname = "userDetails";

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $conn->prepare("SELECT * FROM userDetails WHERE name = :name AND password = :password");

			$stmt->execute(['name' => $name, 'password' => $pass]);

			$user = $stmt->fetch(PDO::FETCH_ASSOC);

			if($user != NULL) {
				$id = $user['id'];
				$_SESSION['user'] = $name;
				$_SESSION['id'] = $id;
				$_SESSION['isactive'] = true;
				header("Location:welcome.php");
			}
			else {
				echo '<script language="javascript">';
				echo 'alert("Check Your Username/ Password !");';
				echo '</script>';
				header("Refresh: 1; url=login.php");
			}


		}
		catch(PDOException $e) {
			echo '<script language="javascript">';
				echo '$sql . "<br>" . $e->getMessage();';
				echo '</script>';
				header("Location:login.php");
		}

		$conn = NULL;
	}
?>

