<?php 
  session_start();
  $chatwithname = $_GET['tomsg'];
  $sender = $_GET['frommsg'];
  $name = $_SESSION['user'];

  if($name != $sender) {
    echo '<script language="javascript">';
    echo 'alert("Sorry Access Denied !");';
     echo '</script>';   
    header("Refresh: 1; url=index.php");
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Chat Room</title>
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
        <li><a href="login.php" style="color: white;font-weight: 700;">BACK</a></li>
        <li style="color: white;font-weight: 700;border: 1px solid black;background-color: black;"><a href="profile.php" style="color: white;font-weight: 700;"><?php echo $name ?></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container">
    <h1>Chat with : <b><?php echo $chatwithname ?></b></h1>
    <hr>
    <?php 
      if(isset($_POST['send'])) {
          if(!empty($_POST['msgbody'])) {
              $msgbody = htmlentities($_POST['msgbody']);
          
              //echo $msgbody;
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "phpchat";
          $tbname = "chats";


            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("INSERT INTO $tbname (tomsg,frommsg,msgbody) VALUES (:tomsg,:frommsg,:msgbody)");

                $stmt->execute(['tomsg' => $chatwithname, 'frommsg' => $name, 'msgbody' => $msgbody]);
              }

          //       $stmt1 = $conn->prepare("SELECT * FROM $tbname WHERE frommsg = '$chatwithname' AND tomsg = '$name'");

          //       $stmt1->execute();

          //       $stmt2 = $conn->prepare("SELECT * FROM $tbname WHERE frommsg = '$name' AND frommsg = '$chatwithname'");

          //       $stmt2->execute();


          //       $results1 = $stmt1->fetchAll();

          //       $results2 = $stmt2->fetchAll();

          //         if($results2 != NULL) {
          //         foreach($results2 as $rows2) {
          //           echo '<div class="col-md-12">';
          //         echo '<div class="col-md-12" style="text-align:right;">';
          //         echo '<div id="content1" style="0.5px solid black;border-radius:10px;">';
          //         echo '<h4>', $rows2['msgbody'], '</h4><br>';
          //         echo '</div>';
          //         echo '</div>';
          //         echo '</div>';
          //         }
          //       }

          //       if($results1 != NULL) {
          //        foreach($results1 as $rows1) {
          //         echo '<div class="col-md-12">';
          //         echo '<div class="col-md-12" style="text-align:left;">';
          //         echo '<div id="content1" style="0.5px solid black;border-radius:10px;">';
          //         echo '<h4>', $rows1['msgbody'], '</h4><br>';
          //         echo '</div>';
          //         echo '</div>';
          //         echo '</div>';
          //       }
          //       }
          //   } 
            catch(PDOException $e){
              echo '<script language="javascript">';
              echo '$sql . "<br>" . $e->getMessage();';
              echo '</script>';   
              header("Refresh: 1; url=index.php");
          }
          $conn = NULL;
      }
    }
        $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "phpchat";
          $tbname = "chats";

         // echo 'not';
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            

                $stmt1 = $conn->prepare("SELECT * FROM $tbname WHERE frommsg = '$chatwithname' AND tomsg = '$name'");
                $stmt1->execute();

                $stmt2 = $conn->prepare("SELECT * FROM $tbname WHERE frommsg = '$name' AND tomsg = '$chatwithname'");
                $stmt2->execute();


                $results1 = $stmt1->fetchAll();

                $results2 = $stmt2->fetchAll();
                ?>
                <div class="col-md-6">
<?php
                 if($results1 != NULL) {
                 foreach($results1 as $rows1) {
                  echo '<div class="col-md-12">';
                  echo '<div class="col-md-12" style="text-align:left;">';
                  echo '<div style="0.5px solid black;border-radius:10px;">';
                  echo '<h4 style="0.5px solid black;border-radius:10px;">', $rows1['msgbody'], '</h4><br>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                }
                }
?>
</div>
<div class="col-md-6">
<?php
                
                if($results2 != NULL) {
                  foreach($results2 as $rows2) {
                    echo '<div class="col-md-12">';
                  echo '<div class="col-md-12" style="text-align:right;">';
                  echo '<div style="0.5px solid black;border-radius:10px;">';
                  echo '<h4>', $rows2['msgbody'], '</h4><br>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  }
                }
                ?>
                </div>
                <?php
            } 
            catch(PDOException $e){
              echo '<script language="javascript">';
              echo '$sql . "<br>" . $e->getMessage();';
              echo '</script>';   
              header("Refresh: 1; url=index.php");
            }
          $conn = NULL;
      


    ?>
</div>
<div class="container">
  <form method="POST">
  <table style="width:100%;margin-top: 20%;position: relative;">
    <tr>
      <td class="col-md-12" style="width:90%;">
        <input type="text" name="msgbody" class="form-control" placeholder="Type a message...">
      </td>
      <td>
        <input type="submit" name="send" value="SEND" class="btn btn-default">
      </td>
    </tr>
  </table>
  </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>