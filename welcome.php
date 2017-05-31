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
<style type="text/css">
    body {
      font-family: 'Source Sans Pro', sans-serif;
      font-weight: 700;
      background-color: rgb(220, 198, 224);
    }
    .navbar {
      background-color: rgb(103, 65, 114);
    }
  </style>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" style="color: white;margin-left: 7%;font-weight: 700;">YapChat</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">

      
        <li><a href="logout.php" style="color: white;font-weight: 700;">LOGOUT</a></li>
        <li style="color: white;font-weight: 700;border: 1px solid black;background-color: black;"><a href="profile.php" style="color: white;font-weight: 700;"><?php echo $name ?></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  <div class="container">
    <h1 style="text-align: center;">All our Users</h1>
    <!-- <hr style="border: 1px solid black;"> -->
    <br>
    <?php 

      $servername = "localhost";
      $username ="root";
      $password = "";
      $dbname = "phpchat";
      $tbname = "userDetails";


      try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $stmt = $conn->prepare("SELECT * FROM $tbname WHERE name != :name");

          $stmt->execute(['name' => $name]);

          $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


          if($results != NULL) {
            echo '<table class="table table-hover table-responsive">';
            echo '<th style="text-align:center;border-bottom:2px solid black;border-top:2px solid black;">#</th>';
            echo '<th style="text-align:center;border-bottom:2px solid black;border-top:2px solid black;">FULL NAME</th>';
            echo '<th style="text-align:center;border-bottom:2px solid black;border-top:2px solid black;">USERNAME</th>';
            foreach($results as $rows) {
              echo '<tr>';
              echo '<td style="text-align:center;">', $rows['id'], '</td>';
              echo '<td style="text-align:center;"><a style="text-decoration:none;color:black;" href="chatroom.php?tomsg=' .$rows['name']. '&frommsg=' .$name. '">', $rows['fullname'], '</a></td>';
              echo '<td style="text-align:center;">', $rows['name'], '</td>';
              echo '</tr>';
            }
          }
          else {
            echo '<h2 style="text-align:center;">No Users Available!</h2>';
          }
      }
      catch(PDOException $e){
              echo '<script language="javascript">';
              echo '$sql . "<br>" . $e->getMessage();';
              echo '</script>';   
              header("Refresh: 1; url=welcome.php");
          }
        $conn = null;


    ?>
  </div>
</body>
</html>