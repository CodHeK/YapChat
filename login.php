<?php
    session_start();
    if(isset($_SESSION['user'])) {
      header('Location: welcome.php');
    }
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>HomePage</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://fonts.googleapis.com/css?family=Changa:200|Source+Sans+Pro:200" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
</head>
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
        <li><a href="login.php" style="color: white;font-weight: 700;">LOG IN</a></li>
        <li><a href="index.php" style="color: white;font-weight: 700;">SIGN UP</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div id="content" style="margin:0 auto;text-align: center;padding-top: 3%;">
    <h1 style="color: rgb(103, 65, 114)">LOG IN</h1>
    <br>
    <form method="POST" action="logincheck.php">
    <div class="col-md-4"></div>
    <div class="form-group col-md-4" style="margin:auto;">
      <input type="text" name="name" placeholder="Enter your @Username" class="form-control"><br>
      <input type="password" name="password" placeholder="Enter Password" class="form-control"><br>
      <input type="submit" class="btn btn-defaut" name="login" value="LOG IN" style="background-color: rgb(103, 65, 114);color: #fff;font-weight: 700;">
    </div>
    <div class="col-md-4"></div>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>