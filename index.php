<?php

session_start();
$time = $_POST['time'];
	

if($_POST['username']){
	$_SESSION['username'] = $_POST['username'];
}

if(!$_SESSION['username']){
	header('Location: http://boola.charlieproctor.com/splash.php');
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

if($_POST['level']){
	$CurrentLevel = $_POST['level'];	
} else{
	$CurrentLevel = 1;
}

if($CurrentLevel == 13){
	$_SESSION['time'] = $time;
	header('Location: http://boola.charlieproctor.com/win.php');
}

$sql = "SELECT Subject,SenderName,SenderEmail,Body,Filename,Filesize,Safe,Icon,WhyMalicious,Recipient,RecipientBlurb FROM Emails WHERE Level=" . $CurrentLevel ." ORDER BY RAND() LIMIT 1";

$result = mysqli_query($conn,$sql);
if (!$result)
  {
  die('Error: ' . mysqli_error($conn));
  }
$row = mysqli_fetch_row($result);

$Subject = $row[0];
$SenderName = $row[1];
$SenderEmail = $row[2];
$Body = $row[3];
$Filename = $row[4];
$Filesize = $row[5];
$Safe = $row[6];
$Icon = $row[7];
$WhyMalicious = $row[8];
$Recipient = $row[9];
$RecipientBlurb = $row[10];
  
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

    <title>Boola Web App - NAME!!</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/jumbotron-narrow.css" rel="stylesheet">
    
  </head>

  <body>
    <div class="container" id="theContainer">
    <div class="row">
    <div class="col-md-2">
    <div style="height:50px"></div>
    <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="50px">
  <li id="l1"><a>$100</a></li>
  <li id="l2"><a>$500</a></li>
  <li id="l3"><a>$1000</a></li>
  <li id="l4"><a>$2500</a></li>
  <li id="l5"><a>$5000</a></li>
  <li id="l6"><a>$10000</a></li>
    <li id="l7"><a>$25000</a></li>
  <li id="l8"><a>$50000</a></li>
    <li id="l9"><a>$100000</a></li>
  <li id="l10"><a>$250000</a></li>
  <li id="l11"><a>$500000</a></li>
  <li id="l12"><a>$1000000</a></li>
</ul>

    </div>
    <div class="col-md-6">
    
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="leader.php">Leaderboard</a></li>
        </ul>
        <h3 class="text-muted">Boola Web App</h3>
      </div>

        <h2 align="left"><?php echo $Subject; ?></h2>
        <h3 align="left"><strong>From:&nbsp;&nbsp;</strong><?php echo $SenderName . ' (' . $SenderEmail .')'; ?></h3>
 <hr>
      <div class="jumbotron" style="padding-left:30px; padding-right:20px; padding-top:20px; padding-bottom:20px;">
        <div class="lead" align="left"><?php echo $Body; ?></div>
      </div>
                
 <div align="center" style="font-size:16px"><div class="panel panel-primary" style="width:400px;">
   <div class="panel-heading">
    <h3 class="panel-title">Attachments</h3>
  </div>
  <div class="panel-body">
<strong><?php echo $Filename . ', ' . $Filesize; ?></strong>
  </div>
</div>
</div>

<style>
.btn-xlarge {
    padding: 18px 28px;
    font-size: 22px;
    line-height: normal;
    -webkit-border-radius: 8px;
       -moz-border-radius: 8px;
            border-radius: 8px;
    }
</style>

      <div class="row marketing">
        <div class="col-lg-6">
<div align="center"><a class="btn btn-xlarge btn-success" onClick="openEmail()" href="#" role="button">Open</a></div>
        </div>

        <div class="col-lg-6">
<div align="center"><a class="btn btn-xlarge btn-danger" onClick="ignoreEmail()" href="#" role="button">Ignore</a></div>
        </div>
      </div>

      <div class="footer">
        <p>&copy; Yale Boolean -- Google Security Hackathon 2014</p>
      </div>
</div>

<div class="col-md-4">
<div style="height:100px">
<div class="row">
<div class="col-md-6">
<div style="font-size:48px" align="left">Time:</div>
</div>
<div class="col-md-6">
<div id="timer" style="font-size:48px" align="left">0.000</div>
</div>
</div>
<div class="jumbotron" style="padding:15px">
<h3>About the Recipient</h3>
<div style="font-size:20px">
<div><strong><?php echo $Recipient; ?></strong></div>

<div><?php echo $RecipientBlurb; ?></div>
</div>
</div>

</div>
</div>


    </div> <!-- /container -->

<!-- modal for CORRECT answers -->
<div class="modal fade" id="theModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="theModalTitle">Correct</h4>
      </div>
      <div class="modal-body">
        <p id="theModalBody">On to the next level</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="theModalButton" type="submit">Bring it!</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<?php
$NextLevel = $CurrentLevel + 1;

if($CurrentLevel > 1){
	$PriorLevel = $CurrentLevel - 1;
} else{
	$PriorLevel =1;	
}
?>
<script type"text/javascript">

$('#l<?php echo $CurrentLevel; ?>').addClass('active');

safeText = "<?php echo $Safe; ?>";

safe = (safeText == "y");
	
function openEmail(){
	if(safe){  // correct -- safe to open
	
	document.getElementById('theModalTitle').innerHTML = "Correct";
	document.getElementById('theModalBody').innerHTML = "The attachment is safe to open! On to the next level.";
	document.getElementById('theModalButton').innerHTML = "Bring it!";
	$('#theModalButton').click(function(){reloadPage(<?php echo $NextLevel; ?>);});
	$('#theModal').modal('show');
		
	} else{ //you die!!!!
	
	$('#theContainer').hide();
	$('#hackImage').show();
	window.setTimeout(function(){
	$('#theContainer').show();
	$('#hackImage').hide();
	document.getElementById('theModalTitle').innerHTML = "Incorrect";
	document.getElementById('theModalBody').innerHTML = "No! That message was malicious. " + "<?php echo $WhyMalicious ?>";
	document.getElementById('theModalButton').innerHTML = "Try again!";
	$('#theModalButton').click(function(){reloadPage(1);});
	$('#theModal').modal('show');
	}, 3000);
	
	}
};

function ignoreEmail(){
	if(safe){
	document.getElementById('theModalTitle').innerHTML = "Sort of...";
	document.getElementById('theModalBody').innerHTML = "That attachment was safe to open! You lose one level.";
	document.getElementById('theModalButton').innerHTML = "Ok!";
	$('#theModalButton').click(function(){reloadPage(<?php echo $PriorLevel; ?>);});
	$('#theModal').modal('show');
			
	} else{
	document.getElementById('theModalTitle').innerHTML = "Correct";
	document.getElementById('theModalBody').innerHTML = "That attachment was malicious. On to the next level.";
	document.getElementById('theModalButton').innerHTML = "Bring it!";
	$('#theModalButton').click(function(){reloadPage(<?php echo $NextLevel; ?>);});
	$('#theModal').modal('show');
	}
};

function reloadPage(level){
	document.getElementById('nextLevel').value = level;
	if(level>1){
		document.getElementById('timePost').value = (new Date - start);
	}
	document.getElementById('levelForm').submit();
};

var start;

<?php if($time){
	echo 'start = new Date - ' . $time .';';
} else{
 echo 'start = new Date;';
}
?>

setInterval(function() {
    $('#timer').text((new Date - start) / 1000);
}, 10);

</script>
<form id="levelForm" onSubmit="index.php" method="post">
<input type="number" hidden="true" value="1" id="nextLevel" name="level">
<input type="number" hidden="true" id="timePost" name="time">
</form>
<script type="text/javascript" src="js/konami.js"></script>
<script type="text/javascript">
	var easter_egg = new Konami();
	easter_egg.code = function() { $('#theContainer').hide();
	$('#hackImage').show(); }
	easter_egg.load();
</script>
</div>
<div hidden="true" id="hackImage" ><img style="height:100%; width:100%" src="img/hack.jpg" class="img-responsive"></div>
  </body>
</html>
