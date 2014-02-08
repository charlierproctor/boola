<?php

session_start();

if(!$_SESSION['username']){
	header('Location: http://boola.charlieproctor.com/splash.php');
}

$username = $_SESSION['username'];
$time = $_SESSION['time'];

if($time < 1000){
	header('Location: http://boola.charlieproctor.com/index.php');	
}

//connects to database
$dbhost="127.0.0.1";
$dbport=3306;
$dbsocket="";
$dbuser="boola_admin";
$dbpassword="@BYoAoLlEa17";
$dbname="boola";
$conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname,$dbport,$dbsocket);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

$sql = "INSERT INTO Users (Username,Time) VALUES ('".$username."',".$time.")";
if (!mysqli_query($conn,$sql))
  {
  die('Error: ' . mysqli_error($conn));
  }
  mysqli_close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">

    <title>CyberGuard: WWIII Edition</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/jumbotron-narrow.css" rel="stylesheet">
    
  </head>

  <body>
  
  <!--Facebook-->
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=280869895398506";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <div class="container">
    <div class="row">
    
    <div class="col-md-2">
    </div>
    
    <div class="col-md-6">
    
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li><a href="index.php">Home</a></li>
          <li><a href="leader.php">Leaderboard</a></li>
        </ul>
        <h3 class="text-muted">CyberGuard: WWIII Edition</h3>
      </div>
		
        <h2 align="left">You won a million dollars!</h2>
        <h2 align="left">&nbsp;&nbsp;&nbsp;&nbsp;Congratulations!</h2> 
        <h3 align="left">Username: <?php echo $username; ?></h3>
        <h3 align="left">Time: <?php echo $time/1000; ?></h3>
 <hr>
      <div class="jumbotron" >
<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fboola.charlieproctor.com" target="_blank"><button class="btn btn-lg btn-primary">Share on Facebook</button></a>
      </div>
      <div class="footer">
        <p>&copy; Yale Boolean -- Google Security Hackathon 2014</p>
      </div>
</div>
    
    <div class="col-md-4">
</div>


</div>

    </div> <!-- /container -->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

  </body>
</html>
