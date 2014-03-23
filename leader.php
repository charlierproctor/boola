<?php

session_start();

if(!$_SESSION['username']){
	header('Location: http://boola.charlieproctor.com/splash.php');
}

$username = $_SESSION['username'];
$time = $_SESSION['time'];

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

<!-- Facebook Meta-Tags -->
<meta property="og:title" content="CyberGuard: WWIII Edition"/>
<meta property="og:site_name" content="CyberGuard: WWIII Edition"/>
<meta property="og:url" content="http://boola.charlieproctor.com/"/>
<meta name="description" property="og:description" content="As an FBI agent in this Who-Wants-To-Be-A-Millionaire spinoff, you are tasked with deciding whether email attachments are safe to download.  Players compete against each other to see who can complete the game (win a million dollars) the quickest."/>
<meta property="fb:app_id" content="280869895398506"/>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/jumbotron-narrow.css" rel="stylesheet">
    
  </head>

  <body>
    <div class="container">
    <div class="row">
    
    <div class="col-md-2">
    </div>
    
    <div class="col-md-6">
    
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li><a href="index.php">Home</a></li>
          <li class="active"><a href="leader.php">Leaderboard</a></li>
        </ul>
        <h3 class="text-muted">CyberGuard: WWIII Edition</h3>
      </div>

        <h2 align="center">Leaderboard</h2>


        <?php $sql = "SELECT Username,Time FROM Users ORDER BY Time LIMIT 20";

$result = mysqli_query($conn,$sql);
if (!$result)
  {
  die('Error: ' . mysqli_error($conn));
  }

?>
<table class="table table-striped">
<tr>
<th>Place</th>
<th>Username</th>
<th>Time (sec)</th>
</tr>
<?php  
$i = 0;
$timeBefore = 0;
while($row = mysqli_fetch_row($result)){
	if($row[1] != $timeBefore){
		$i = $i + 1;
	}
	$timeBefore = $row[1];
	
	echo '<tr>';
	echo '<td>' . $i . '</td>';
	echo '<td>' . $row[0] . '</td>';
	echo '<td>' . ($row[1] / 1000) . '</td>';
	echo '</tr>';
}

  mysqli_close();
  
  ?>        
</table>
      <div class="footer">
        <p>&copy; Yale Boolean -- Google Security Hackathon 2014</p>
      </div>
</div>
    
    <div class="col-md-4">
    <div class="row">
    <div class="col-md-6">
    </div>
    <div class="col-md-6">
    <div style="height:250px"></div>
   <div data-spy="affix" data-offset-top="250px"><a href="index.php"><button class="btn btn-lg btn-primary">Give me a shot!</button></a></div>
</div>
</div></div>

</div>
      
    </div> <!-- /container -->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

  </body>
</html>
